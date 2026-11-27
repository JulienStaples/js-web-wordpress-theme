/* Shared interaction motion. Keep the site's existing state handlers and
 * use WAAPI for small reversible UI transitions, independent of GSAP demos. */
(() => {
    'use strict';
    const media = window.matchMedia('(prefers-reduced-motion: reduce)');
    const PANEL = 300, DEVICE = 460;
    const SMOOTH = 'cubic-bezier(.22,.8,.3,1)';
    const SPRING = 'cubic-bezier(.22,.8,.28,1.255)';
    const canAnimate = () => !media.matches && typeof Element.prototype.animate === 'function';
    const active = new Map();
    const devices = new Map();
    const detailsGroups = new Map();
    const detailsState = new WeakMap();
    const toggleGroups = [];
    const rect = el => el.getBoundingClientRect();
    const px = n => `${n}px`;
    const announceCapability = section => section.dispatchEvent(new Event('capability:change'));

    // Cancel without resetting the current visual height; the next motion
    // starts from the sampled height, not the previous endpoint.
    function stopHeight(el) {
        const running = active.get(el);
        const style = getComputedStyle(el);
        const sampled = {height:px(rect(el).height), paddingTop:style.paddingTop, paddingBottom:style.paddingBottom,
            borderTopWidth:style.borderTopWidth, borderBottomWidth:style.borderBottomWidth};
        if (running) { running.animation.cancel(); active.delete(el); }
        return sampled;
    }
    function heightMotion(el, from, to, finish) {
        if (!canAnimate()) { finish(); return; }
        const previousOverflow = el.style.overflow;
        el.style.overflow = 'hidden';
        const animation = el.animate([from,to], {duration:PANEL,easing:SMOOTH,fill:'both'});
        const cleanup = () => { el.style.overflow = previousOverflow; };
        active.set(el,{animation,finish:()=>{cleanup();finish();},cleanup});
        animation.onfinish = () => {
            if (active.get(el)?.animation !== animation) return;
            active.delete(el); animation.cancel(); cleanup(); finish();
        };
    }
    // Restore overflow on interruption as well as normal completion.
    function interrupt(el) {
        const old = active.get(el);
        const sample = stopHeight(el);
        old?.cleanup();
        return sample;
    }
    function boxMetrics(el) {
        const s = getComputedStyle(el);
        return {height:px(rect(el).height),paddingTop:s.paddingTop,paddingBottom:s.paddingBottom,
            borderTopWidth:s.borderTopWidth,borderBottomWidth:s.borderBottomWidth};
    }
    const zero = {height:'0px',paddingTop:'0px',paddingBottom:'0px',borderTopWidth:'0px',borderBottomWidth:'0px'};

    // Native details keep their summary semantics. When JS is enabled we
    // manage their existing name groups so a closing panel can animate.
    function setDetails(el, open) {
        const summary = el.querySelector(':scope > summary');
        const state = detailsState.get(el);
        if (!summary || !state) return;
        const wasOpen = el.open;
        const from = interrupt(el);
        state.wanted = open;
        if (open) el.open = true;
        summary.setAttribute('aria-expanded', String(open));
        el.classList.toggle('motion-details-open', open);
        state.content.forEach(child => { child.inert = !open; });
        if (!open && !wasOpen) return;
        const target = open ? rect(el).height : rect(summary).height + (parseFloat(getComputedStyle(el).borderTopWidth)||0) + (parseFloat(getComputedStyle(el).borderBottomWidth)||0);
        heightMotion(el, {height:from.height}, {height:px(target)}, () => { el.open = open; });
    }
    document.querySelectorAll('details').forEach(el => {
        const summary = el.querySelector(':scope > summary');
        if (!summary) return;
        const name = el.getAttribute('name');
        if (name) {
            if (!detailsGroups.has(name)) detailsGroups.set(name,[]);
            detailsGroups.get(name).push(el);
            el.removeAttribute('name');
        }
        const content = [...el.children].filter(child => child !== summary);
        detailsState.set(el,{wanted:el.open,content});
        el.classList.add('motion-details');
        el.classList.toggle('motion-details-open',el.open);
        summary.setAttribute('aria-expanded',String(el.open));
        content.forEach(child => {child.inert=!el.open;});
        summary.addEventListener('click', event => {
            if (event.defaultPrevented || event.target.closest('a,button,input,select,textarea')) return;
            event.preventDefault();
            const open = !detailsState.get(el).wanted;
            if (open && name) detailsGroups.get(name).forEach(other => {
                if(other!==el && detailsState.get(other).wanted) setDetails(other,false);
            });
            setDetails(el,open);
        });
    });

    // Tools have a custom disclosure implementation. Same-grid-row switches
    // replace the old panel immediately and interpolate the new panel height,
    // rather than placing two panels in the same grid cell.
    function toggleCapability(section,triggers,trigger) {
        if (!canAnimate()) return false;
        const panelFor = button => document.getElementById(button.getAttribute('aria-controls'));
        const panel = panelFor(trigger);
        if (!panel) return false;
        const open = trigger.getAttribute('aria-expanded') !== 'true';
        let inherited = null;
        triggers.forEach(button => {
            const other = panelFor(button);
            if (!other || other.hidden || (button===trigger && open)) return;
            const from = interrupt(other);
            button.setAttribute('aria-expanded','false'); other.inert = true;
            if (open && other !== panel && other.parentElement === panel.parentElement && matchMedia('(min-width: 48rem)').matches) {
                inherited = from; other.hidden=true; other.inert=false;
            } else {
                heightMotion(other,from,zero,()=>{other.hidden=true;other.inert=false;announceCapability(section);});
            }
        });
        if (open) {
            const from = panel.hidden ? (inherited || zero) : interrupt(panel);
            panel.hidden = false; panel.inert = false;
            trigger.setAttribute('aria-expanded','true');
            const to=boxMetrics(panel);
            heightMotion(panel,from,to,()=>{});
        }
        announceCapability(section);
        return true;
    }
    window.jsWebInteractions = {toggleCapability};

    // Selected toggle background slides between the actual button bounds,
    // including when the two controls wrap on very narrow screens.
    const syncToggle = group => {
        const selected = group.querySelector('[aria-pressed="true"]');
        const indicator = group.querySelector(':scope > .motion-indicator');
        if (!selected || !indicator || !group.getClientRects().length) return;
        if(!selected.offsetWidth || !selected.offsetHeight)return;
        Object.assign(indicator.style,{left:px(selected.offsetLeft),top:px(selected.offsetTop),width:px(selected.offsetWidth),height:px(selected.offsetHeight)});
    };
    const resize = 'ResizeObserver' in window ? new ResizeObserver(entries=>entries.forEach(e=>syncToggle(e.target))) : null;
    const toggleParents=new Set([...document.querySelectorAll('[data-ne6-view],[data-preview-toggle]')].map(b=>b.parentElement));
    toggleParents.forEach(group => {
        const indicator = document.createElement('span');
        indicator.className='motion-indicator'; indicator.setAttribute('aria-hidden','true');
        indicator.style.transition='none'; group.prepend(indicator); group.classList.add('motion-toggle');
        syncToggle(group); requestAnimationFrame(()=>{indicator.style.transition='';});
        const observer=new MutationObserver(()=>syncToggle(group));
        group.querySelectorAll('[data-ne6-view],[data-preview-toggle]').forEach(b=>observer.observe(b,{attributes:true,attributeFilter:['aria-pressed']}));
        resize?.observe(group); toggleGroups.push(group);
    });
    document.querySelectorAll('[data-preview-view]').forEach(view=>view.parentElement.classList.add('motion-preview-stage'));

    function currentFrame(root,type) {
        if(type==='ne6') {
            const slide=root.querySelector('[data-ne6-slide]:not(.hidden)');
            if(!slide)return null;
            return {frame:slide.dataset.ne6Mode==='mobile' ? slide.querySelector(':scope > div > div') : slide.querySelector('img'),stage:slide.parentElement,mode:slide.dataset.ne6Mode};
        }
        const view=root.querySelector('[data-preview-view]:not([hidden])');
        return view ? {frame:view.firstElementChild,stage:view.parentElement,mode:view.dataset.previewView} : null;
    }
    function cloneFrame(frame) {
        const clone=frame.cloneNode(true);
        [clone,...clone.querySelectorAll('[id]')].forEach(el=>el.removeAttribute('id'));
        clone.querySelectorAll('img').forEach(img=>{img.loading='eager';img.alt='';});
        if(clone.tagName==='IMG'){clone.loading='eager';clone.alt='';}
        const layer=document.createElement('div'); layer.className='motion-device-layer'; layer.append(clone); return layer;
    }
    function position(frame,stage) {
        const f=rect(frame),s=rect(stage);
        return {left:px(f.left-s.left-stage.clientLeft),top:px(f.top-s.top-stage.clientTop),width:px(f.width),height:px(f.height),borderRadius:getComputedStyle(frame).borderRadius};
    }
    function finishDevice(stage) { devices.get(stage)?.finish(); }
    const pending = new WeakMap();
    // Capture the outgoing geometry before the existing click handlers update
    // the selected device. Read the incoming geometry after those handlers.
    document.addEventListener('click',event=>{
        const button=event.target.closest('[data-ne6-view],[data-preview-toggle]');
        if(!button||button.disabled||button.getAttribute('aria-pressed')==='true'||!canAnimate())return;
        const type=button.hasAttribute('data-ne6-view')?'ne6':'portfolio';
        const root=button.closest(type==='ne6'?'[data-ne6-gallery]':'[data-project-panel]');
        if(!root)return;
        const old=currentFrame(root,type);
        if(!old?.frame)return;
        finishDevice(old.stage);
        if(!rect(old.frame).width)return;
        pending.set(event,{root,type,old,from:position(old.frame,old.stage),layer:cloneFrame(old.frame)});
    },true);
    document.addEventListener('click',event=>{
        const data=pending.get(event);
        if(!data)return;
        pending.delete(event);
        const {root,type,old,from,layer}=data;
        const next=currentFrame(root,type);
        if(!next?.frame||next.mode===old.mode||next.stage!==old.stage||!rect(next.frame).width)return;
        const stage=next.stage;
        const to=position(next.frame,stage);
        const overlay=document.createElement('div'); overlay.className='motion-device-overlay'; overlay.setAttribute('aria-hidden','true'); overlay.inert=true;
        const incoming=cloneFrame(next.frame);
        Object.assign(overlay.style,from); incoming.style.opacity='0'; overlay.append(layer,incoming);
        next.frame.classList.add('motion-device-muted'); stage.append(overlay);
        const size=overlay.animate([from,to],{duration:DEVICE,easing:SPRING,fill:'both'});
        const fade=incoming.animate([{opacity:0},{opacity:0,offset:.22},{opacity:1,offset:.76},{opacity:1}],{duration:DEVICE,fill:'both',easing:'linear'});
        const finish=()=>{size.cancel();fade.cancel();overlay.remove();next.frame.classList.remove('motion-device-muted');devices.delete(stage);};
        devices.set(stage,{finish}); size.onfinish=finish;
    });
    // Other gallery/project operations retain their original instantaneous
    // behavior; interrupt the temporary device overlay before those actions.
    document.addEventListener('click',event=>{
        if(event.target.closest('[data-ne6-thumb],[data-ne6-previous],[data-ne6-next],[data-project-selector],[data-spotlight-tab]'))
            [...devices.keys()].forEach(finishDevice);
    },true);
    window.addEventListener('resize',()=>{[...devices.keys()].forEach(finishDevice);toggleGroups.forEach(syncToggle);});
    media.addEventListener?.('change',()=>{
        if(!media.matches)return;
        [...devices.keys()].forEach(finishDevice);
        [...active.entries()].forEach(([el,state])=>{active.delete(el);state.animation.cancel();state.finish();});
    });
})();
