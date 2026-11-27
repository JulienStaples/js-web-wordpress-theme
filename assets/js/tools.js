/* Tools & Capabilities — decorative, finite GSAP-driven illustrations.
 * Drawing coordinates use the approved 360 × 240 storyboard. No external assets.
 * Static SVGs are exported from these same renderers (see CommonJS export below).
 */
(() => {
    'use strict';
    const clamp = n => Math.max(0, Math.min(1, n));
    const mix = (a,b,p) => a+(b-a)*p;
    const ease = n => { n=clamp(n); return n*n*(3-2*n); };
    const phase = (t,start,duration) => ease((t-start)/duration);
    const back = (n,energy=1) => { n=clamp(n); const s=1.70158*energy; return 1+(s+1)*(n-1)**3+s*(n-1)**2; };
    // Shared continuous overshoot, matching the approved code-to-app motion.
    // Restrict travel, not the easing curve, where a layout has tight bounds.
    const spring = n => back(n,1.85);
    const snap = (t,start,duration) => spring((t-start)/duration);
    const restrained = (n,amount=.25) => back(n,1.85*amount);
    const INTRO=.28;
    const num = n => Number(n.toFixed(3));
    const rect = (x,y,w,h,f='#aaa',r=2,extra='') => w>0&&h>0?`<rect x="${num(x)}" y="${num(y)}" width="${num(w)}" height="${num(h)}" rx="${num(Math.min(r,w/2,h/2))}" fill="${f}" ${extra}/>`:'';
    const dot = (x,y,r,f='#aaa') => r>0?`<circle cx="${num(x)}" cy="${num(y)}" r="${num(r)}" fill="${f}"/>`:'';
    const path = (d,stroke='#888',width=1,fill='none',extra='') => `<path d="${d}" fill="${fill}" stroke="${stroke}" stroke-width="${width}" stroke-linecap="round" stroke-linejoin="round" ${extra}/>`;
    const group = (body,transform='',opacity=1,extra='') => opacity>0?`<g transform="${transform}" opacity="${num(clamp(opacity))}" ${extra}>${body}</g>`:'';
    const chrome = (w=312) => rect(0,0,w,24,'#414141',0)+[12,22,32].map(x=>dot(x,12,3)).join('');
    const windowFrame = (body,id,w=312) => `<defs><clipPath id="${id}-window"><rect width="${num(w)}" height="208" rx="6"/></clipPath></defs>`+group(rect(0,0,w,208,'#f7f7f7',6)+body,'translate('+num((360-w)/2)+' 16)',1,`clip-path="url(#${id}-window)"`);
    const stage = (body) => rect(0,0,360,240,'#292929',0)+body;
    const hand = (x,y,scale=.54) => group(path('M8 13V3C8 .4 12 .4 12 3V10C12 7.7 16 7.7 16 10V11C16 8.7 20 8.7 20 11V13C20 10.7 23 10.7 23 13V18C23 23 20 26 15 26H12C9 26 7 24 5 21L1.5 16C-.1 13 3.5 11.4 5.5 14L8 17Z','#414141',1.7,'#f7f7f7'),`translate(${num(x)} ${num(y)}) scale(${scale}) translate(-8 -1)`);
    // 01 — page builder. Drag modules locally, save, then expand the page.
    const WP_END=2.98/.9+(3.6-2.98)/2;
    function wordpress(seconds,id) {
        const t=seconds<=2.98/.9?seconds*.9:2.98+(seconds-2.98/.9)*2;
        const exit=restrained((t-3.1)/.5,.4),px=mix(91,16,exit),sx=mix(1,1.4,exit);
        const modules=[
            rect(0,0,168,16,'#555'),rect(113,33,89,107,'#ccc',3),
            [99,93,99,67].map((w,i)=>rect(0,39+i*11,w,5,'#aaa',1)).join(''),rect(0,100,64,23,'#414141',3)
        ];
        const sources=[[39.5,50.5],[39.5,90.5],[39.5,130.5],[39.5,170.5]];
        const targets=[[175,50],[248.5,128.5],[140.5,99],[123,153.5]];
        const tiles=[rect(-19,-3,38,6,'#777'),rect(-19,-10,38,20,'#aaa'),[-7,0,7].map(y=>rect(-19,y,34,3,'#999',1)).join(''),rect(-15,-7,30,14,'#777')];
        let side=rect(0,24,79,184,'#e1e1e1',0),page='',floating='',cursor='',last=sources[0];
        for(let i=0;i<4;i++){
            const local=t-(.08+i*.65),[a,b]=sources[i],[x,y]=targets[i];
            const drag=phase(local,.22,.28),drop=phase(local,.5,.12),lift=phase(local,.17,.06);
            side+=rect(10,35+i*40,59,31,'#f7f7f7',4)+group(tiles[i],`translate(${a} ${b})`,local<.17?1:.32);
            if(local>=.5){
                const q=spring((local-.5)/.23),s=.68+.32*q;
                const [cx,cy]=[ [84,8],[157.5,86.5],[49.5,58],[32,111.5] ][i];
                page+=group(modules[i],`translate(${px} 42) scale(${sx} 1) translate(${cx} ${num(cy-10*(1-q))}) scale(${num(s)}) translate(${-cx} ${-cy})`,Math.min(1,drop*2));
            }
            if(local>=.17&&local<.5){
                const fx=mix(a,x,drag),fy=mix(b,y,drag)-17*Math.sin(Math.PI*drag);
                floating+=group(rect(-29,-15,59,31,'#222',4,'opacity=".12" transform="translate(2 3)"')+rect(-29,-15,59,31,'#eee',4)+tiles[i],`translate(${num(fx)} ${num(fy)}) rotate(${num(-8*Math.sin(Math.PI*drag))}) scale(${num(1+.12*lift)})`);
                floating+=rect(x-24,y-12,48,24,'none',3,'stroke="#999" stroke-dasharray="3 3"');
            }
            if(local>=0&&local<.65){
                const p=phase(local,0,.17),cx=local<.22?mix(last[0],a,p):mix(a,x,drag),cy=local<.22?mix(last[1],b,p):mix(b,y,drag)-17*Math.sin(Math.PI*drag);
                cursor=hand(cx,cy);
                if(local>=.5&&local<.62)floating+=`<circle cx="${x}" cy="${y}" r="${num(4+12*drop)}" fill="none" stroke="#888" opacity="${num(.6*(1-drop))}"/>`;
            }
            last=targets[i];
        }
        const save=phase(t,2.68,.30),saved=phase(t,3.0,.1);
        side+=rect(10,193,59,11,'#414141',2)+rect(26,197,27,3,'#eee',1);
        if(t>=2.68&&t<3.15)cursor=hand(mix(last[0],40,save),mix(last[1],198,save));
        if(saved>0)side+=path('M31 198l5 4 9-8','#fff',1.8,'none',`opacity="${saved}"`);
        return stage(windowFrame(group(side,`translate(${num(-79*exit)} 0)`)+page+floating+cursor+chrome(),id));
    }
    // 02 — alignment, contrast, consistent spacing, then tablet and phone.
    const desktop={logo:[14,29,35,8],n0:[222,31,18,4],n1:[249,31,18,4],n2:[276,31,22,4],h0:[14,60,133,14],h1:[14,81,99,11],p0:[14,105,125,4],p1:[14,115,110,4],p2:[14,125,83,4],cta:[14,142,68,20],image:[160,60,138,102],c0:[14,176,88,20],c1:[112,176,88,20],c2:[210,176,88,20]};
    const imperfect={...desktop,h0:[23,60,133,14],h1:[19,81,99,11],p0:[27,105,125,4],p1:[18,115,110,4],p2:[25,125,83,4],cta:[22,142,68,20],image:[160,66,138,102],c0:[14,173,82,20],c1:[105,182,96,20],c2:[219,177,79,20]};
    const tablet={logo:[12,29,29,7],n0:[146,31,12,3],n1:[165,31,12,3],n2:[184,31,18,3],h0:[12,55,96,11],h1:[12,71,70,9],p0:[12,89,89,3],p1:[12,98,79,3],p2:[12,107,61,3],cta:[12,125,52,15],image:[117,55,86,85],c0:[12,160,59,18],c1:[78,160,59,18],c2:[144,160,59,18]};
    const mobile={logo:[10,29,27,6],n0:[106,31,16,2],n1:[106,35,16,2],n2:[106,39,16,2],h0:[10,51,100,10],h1:[10,65,76,8],image:[10,80,112,39],p0:[10,126,105,3],p1:[10,133,94,3],p2:[10,140,68,3],cta:[10,151,46,13],c0:[10,172,112,7],c1:[10,184,112,7],c2:[10,196,112,7]};
    function frontend(t,id){
        const align=snap(t,.35,.48),contrast=phase(t,1.12,.43),spacing=snap(t,1.95,.48),tab=restrained((t-2.9)/.6,.35),reflow=phase(t,3.5,.45),narrow=phase(t,3.95,.6);
        const stackProgress=restrained((narrow-.35)/.65,.45);
        const mobileProgress=narrow<=.35?narrow:.35+.65*stackProgress;
        const w=mix(mix(312,215,tab),132,stackProgress);
        let body='';
        for(const key of Object.keys(desktop)){
            const p=key[0]==='c'&&key!=='cta'?spacing:align;
            let a=imperfect[key].map((v,i)=>mix(v,desktop[key][i],p));
            a=a.map((v,i)=>mix(v,tablet[key][i],tab));
            // Move text below the image before sliding the image left; avoid crossing.
            const intermediate=key==='image'?[117,80,86,39]:key[0]==='p'||key==='cta'?mobile[key]:key[0]==='c'&&key!=='cta'?[tablet[key][0],176,tablet[key][2],12]:key[0]==='h'?mobile[key]:tablet[key];
            a=a.map((v,i)=>mix(v,intermediate[i],reflow));
            if(key[0]==='c'&&key!=='cta'&&narrow>0){
                // Collapse the old row, then unfold the stacked rows without intersection.
                const j=Number(key[1]),v=phase(narrow,0,.35),q=stackProgress;
                if(narrow<.35){a[1]=mix(a[1],172+j*12,v);a[3]=mix(a[3],7,v);}
                else a=[mix(tablet[key][0],mobile[key][0],q),mobile[key][1],mix(tablet[key][2],112,q),7];
                a[0]=Math.min(a[0],w-a[2]-5);
                a[2]=Math.min(a[2],w-a[0]-5);
            }else a=a.map((v,i)=>mix(v,mobile[key][i],mobileProgress));
            const grey=Math.round(mix(206,65,contrast));
            const fill=key==='cta'?`rgb(${grey},${grey},${grey})`:key==='image'?'#c9c9c9':key[0]==='h'||key==='logo'?'#555':key[0]==='c'?'#ddd':'#aaa';
            let element=rect(...a,fill,key==='image'||key==='cta'?3:1.5);
            if(key==='cta'){
                element+=rect(a[0]+a[2]*.22,a[1]+a[3]*.42,a[2]*.56,Math.min(4,a[3]*.22),contrast>.5?'#eee':'#aaa',1);
                const q=snap(t,1.12,.43),scale=t<1.12?1:1+.22*(q-1)*phase(t,1.12,.09);
                const cx=a[0]+a[2]/2,cy=a[1]+a[3]/2;
                element=group(element,`translate(${num(cx)} ${num(cy)}) scale(${num(scale)}) translate(${num(-cx)} ${num(-cy)})`);
            }
            body+=element;
        }
        const guide=(start,end)=>phase(t,start,.1)*(1-phase(t,end,.15));
        body+=group(path('M14 50V166 M9 60H153 M9 142H90','#888',.8,'none','stroke-dasharray="3 3"'),'',guide(.25,.83));
        body+=group(rect(11,139,74,26,'none',2,'stroke="#888" stroke-dasharray="3 3"'),'',guide(1.02,1.55));
        body+=group(path('M102 185H112 M102 182V188 M112 182V188 M200 185H210 M200 182V188 M210 182V188','#888',1),'',guide(1.85,2.43));
        return stage(windowFrame(body+chrome(w),id,w));
    }
    // 03 — overview, comparison bars, then a trend. All figures illustrative.
    const land=[
        'M5 20L12 13 23 12 31 6 48 7 53 12 66 9 77 18 67 23 64 31 55 35 52 45 43 46 34 39 26 35 24 26 15 27 9 24Z',
        'M70 3L85 2 94 8 88 19 78 16Z','M48 46L59 47 70 54 78 63 73 76 66 84 63 98 56 106 51 95 53 84 46 70 43 57Z',
        'M98 18L109 11 123 14 129 21 124 29 115 30 113 37 102 31 97 25Z','M100 39L113 35 125 41 136 50 130 63 121 78 113 82 107 73 104 60 96 51Z',
        'M126 17L144 9 157 12 167 8 186 11 197 22 191 31 181 32 175 42 165 44 160 57 151 60 142 48 133 39 120 35 126 29Z',
        'M163 61L171 64 177 72 187 74 185 79 173 75 166 70Z','M178 85L191 79 203 86 207 96 195 101 180 95Z','M131 72L136 76 132 87 129 82Z'
    ];
    const locations=[[43,27,6],[62,69,3.5],[113,24,7],[150,43,4.5],[177,29,5],[195,92,3]];
    function analytics(t,id){
        let body='';
        for(let i=0;i<3;i++){
            const x=36+i*99,p=clamp((t-i*.09)/.43),q=spring(p);
            const metric=rect(x,49,90,33,'#e4e4e4',4)+rect(x+9,56,[28,33,24][i],3,'#aaa',1)+rect(x+9,65,[39,33,46][i]*phase(t,.1+i*.09,.4),9,'#555')+path(`M${x+72} 70l4-4 4 4M${x+76} 66v9`,'#888',1.3);
            body+=group(metric,`translate(${x+45} ${num(65.5+9*(1-q))}) scale(${num(.94+.06*q)}) translate(${-x-45} -65.5)`,ease(p*2));
        }
        const intro=snap(t,.17,.48),merge=clamp((t-1.1)/.58),dock=ease(merge);
        body+=group(rect(36,90+12*(1-intro),178+110*restrained(merge,.30),123,'#e9e9e9',4),'',ease(intro*2));
        const geo=rect(46,99,55,4,'#888')+group(land.map(d=>path(d,'#e9e9e9',1,'#b9b9b9')).join('')+locations.map(([x,y,r],i)=>dot(x,y,Math.max(0,r*spring((t-.3-i*.075)/.29)),'#555')).join(''),'translate(42 116) scale(.81 .75)')+rect(46,200,25,3,'#aaa',1)+rect(75,200,17,3,'#aaa',1);
        body+=group(geo,`translate(0 ${num(12*(1-intro))})`,intro*(1-ease(merge*2.3)));
        const rankIntro=clamp((t-.27)/.4),deviceIntro=clamp((t-.38)/.4);
        let rank=rect(222,90,102,72,'#e9e9e9',4)+rect(231,99,51,4,'#888');
        [57,43,31,19].forEach((w,i)=>{rank+=rect(231,112+i*11,[15,18,12,16][i],3,'#aaa',1)+rect(257,110+i*11,w*restrained((t-.4-i*.07)/.32,.5),6,'#888',1.5);});
        body+=group(rank,`translate(${num(273+25*(1-spring(rankIntro))-45*dock)} 126) scale(${num(1-.48*dock)}) translate(-273 -126)`,ease(rankIntro*2)*(1-ease((merge-.15)/.7)));
        let device=rect(222,169,102,44,'#e9e9e9',4)+`<circle cx="243" cy="191" r="12" fill="none" stroke="#ccc" stroke-width="6"/><circle cx="243" cy="191" r="12" fill="none" stroke="#777" stroke-width="6" stroke-dasharray="${num(49*phase(t,.4,.55))} 76" transform="rotate(-90 243 191)"/>`;
        [45,32,23].forEach((w,i)=>{device+=rect(264,180+i*10,w,3,'#999',1);});
        body+=group(device,`translate(${num(273+25*(1-spring(deviceIntro))-45*dock)} ${num(191-20*dock)}) scale(${num(1-.48*dock)}) translate(-273 -191)`,ease(deviceIntro*2)*(1-ease((merge-.15)/.7)));
        let chart=rect(48,101,61,5,'#888')+rect(281,101,31,4,'#aaa',1)+[118,137,156,175,194].map(y=>path(`M49 ${y}H312`,'#d0d0d0',.8)).join('')+[51,109,169,229,289].map(x=>rect(x,202,18,3,'#aaa',1)).join('');
        const convert=clamp((t-2.5)/.62),m=ease(convert),points=[];
        [27,59,39,67,48,71,55,63].forEach((h,i)=>{
            const height=mix(h*restrained((t-1.56-i*.055)/.46, h>65?.65:1),[13,26,22,40,35,52,49,73][i],restrained(convert,.6)),x=61+i*34,w=mix(23,3,m);
            chart+=group(rect(x-w/2,194-height,w,height*(1-ease((convert-.35)/.65)),'#777'),' ',1-ease((convert-.6)/.4));
            points.push([x,num(194-height)]);
        });
        const d=points.map((p,i)=>(i?'L':'M')+p.join(' ')).join(' '),reveal=phase(t,2.65,.6);
        chart+=`<defs><clipPath id="${id}-line"><rect x="49" y="110" width="${num(263*reveal)}" height="85"/></clipPath></defs>`+group(group(path(d+'L299 194H61Z','none',0,'#d0d0d0'),' ',.7*phase(t,3,.3))+group(path(d,'#555',2.4)+points.map(([x,y])=>dot(x,y,2.5*ease((convert-.35)/.5),'#555')).join(''),' ',ease((convert-.2)/.6)),'',1,`clip-path="url(#${id}-line)"`);
        body+=group(chart,'',ease((merge-.5)/.5));
        const toolbar=[9,13,16].map((h,i)=>rect(307+i*7,33-h,4,h,'#bdbdbd',1)).join('');
        return stage(windowFrame(group(body,'translate(-24 -16)')+chrome()+group(toolbar,'translate(-24 -16)'),id));
    }
    // 04 — write code with overshoot, then reveal the application from top to bottom.
    const WRITE=1.2/.35,RENDER=.6,OVERLAP=.2,APP_END=WRITE-OVERLAP+RENDER+.5;
    const code=[[0,[25,47,28]],[0,[24,65,18]],null,[0,[44,37,13]],[1,[24,46,35]],[1,[30,21,44]],null,[1,[24,62,28]],[2,[23,45,61]],[3,[18,28,37]],[3,[26,61,48]],[3,[23,39,32]],[2,[14,46]],[2,[24,31,44]],[3,[30,70,40]],[2,[17,35]],[1,[16,37]],[0,[13]]];
    function inverseEase(v){let lo=0,hi=1;for(let i=0;i<20;i++){const m=(lo+hi)/2;if(ease(m)<v)lo=m;else hi=m;}return (lo+hi)/2;}
    const arrivals=[66,95,95,95,145,145].map((y,i)=>RENDER*inverseEase((y-40)/184)+[0,0,.035,.07,0,.045][i]);
    function additional(time,id){
        let editor=rect(24,16,312,208,'#353535',6);
        const t=Math.min(time*.35,1.2);
        code.forEach((line,i)=>{
            if(!line)return;
            const x=45+line[0]*13,y=52+i*9,segments=line[1],total=segments.reduce((a,b)=>a+b,0)+5*(segments.length-1),q=Math.max(0,back((t-i*.059)/.195,1.85));
            if(q<=0)return;
            let remaining=total*Math.min(q,1),xx=0,s='';
            segments.forEach((w,j)=>{s+=rect(xx,0,Math.min(w,Math.max(0,remaining)),3.8,['#bdbdbd','#888','#dedede','#a5a5a5'][(i+j)%4],1.3);remaining-=w+5;xx+=w+5;});
            editor+=group(s,`translate(${x} ${y}) scale(${num(Math.max(1,q))} 1)`);
        });
        const rt=time-(WRITE-OVERLAP);
        const arrive=(i,x,y,w,h,s)=>{
            const age=rt-arrivals[i];if(age<0)return '';
            const q=back(age/.44,1.85),scale=.94+.06*q,offset=-20*(1-q);
            return group(s,`translate(${num(x+w/2)} ${num(y+h/2+offset)}) scale(${num(scale)}) translate(${-x-w/2} ${-y-h/2})`,ease(age/.07));
        };
        let app=rect(24,16,312,208,'#f7f7f7',6)+rect(24,40,312,24,'#e5e5e5',0)+rect(37,47,38,9,'#555')+[252,279,306].map(x=>rect(x,50,17,3,'#999',1)).join('');
        app+=arrive(0,38,74,284,22,rect(38,74,117,12,'#555')+rect(38,92,83,4,'#aaa',1)+rect(273,76,49,17,'#414141',3)+rect(284,83,27,3,'#eee',1));
        for(let i=0;i<3;i++){const x=38+i*97;app+=arrive(i+1,x,107,90,43,rect(x,107,90,43,'#e2e2e2',4)+rect(x+9,115,[34,28,39][i],4,'#999',1)+rect(x+9,127,[43,32,49][i],12,'#555'));}
        let lower=rect(38,159,173,53,'#e3e3e3',4)+rect(47,168,56,4,'#777',1);
        [0,1,2].forEach(i=>{lower+=rect(47,180+i*9,7,5,'#aaa',1)+rect(61,181+i*9,[87,67,98][i],3,'#aaa',1)+rect(185,180+i*9,16,5,'#888');});
        app+=arrive(4,38,159,173,53,lower)+arrive(5,219,159,103,53,rect(219,159,103,53,'#e3e3e3',4)+rect(229,168,52,4,'#777',1)+rect(229,181,82,6,'#c3c3c3')+rect(229,181,56,6,'#777')+rect(229,196,37,4,'#999',1)+rect(277,193,34,12,'#555'));
        const height=184*ease(rt/RENDER);
        return stage(windowFrame(group(editor+`<defs><clipPath id="${id}-render"><rect x="24" y="40" width="312" height="${num(height)}"/></clipPath></defs>`+group(app,'',1,`clip-path="url(#${id}-render)"`),'translate(-24 -16)')+chrome(),id));
    }
    const demos=[{draw:wordpress,duration:WP_END},{draw:frontend,duration:4.65},{draw:analytics,duration:4},{draw:additional,duration:APP_END}];
    // Export only when run with Node for deterministic static snapshots / checks.
    if(typeof module==='object'&&module.exports){module.exports=demos;return;}
    if(typeof document==='undefined'||!window.gsap)return;
    const section=document.getElementById('capabilities');
    if(!section)return;
    const motion=window.matchMedia('(prefers-reduced-motion: reduce)');
    const svgNS='http://www.w3.org/2000/svg';
    const states=[];
    section.querySelectorAll('[data-capability-demo]').forEach((host)=>{
        const index=Number(host.dataset.capabilityDemo),demo=demos[index],panel=host.closest('[role="region"]');
        if(!demo||!panel)return;
        const svg=document.createElementNS(svgNS,'svg');
        svg.setAttribute('viewBox','0 0 360 240');
        svg.setAttribute('width','360');svg.setAttribute('height','240');
        svg.setAttribute('focusable','false');svg.setAttribute('aria-hidden','true');
        svg.style.cssText='display:block;width:100%;height:auto;opacity:1;';
        host.style.backgroundColor='#292929';
        const clock={time:demo.duration};
        const render=()=>{svg.innerHTML=demo.draw(clock.time,'cap-motion-'+index);};
        render();host.replaceChildren(svg);
        const state={host,panel,svg,clock,render,demo,animation:null,open:false,visible:true};
        states.push(state);
    });
    function stop(state,showEnd=true){
        if(state.animation){state.animation.kill();state.animation=null;}
        if(showEnd){state.clock.time=state.demo.duration;state.render();state.svg.style.opacity='1';}
    }
    function syncPlayback(state){
        if(!state.animation)return;
        if(!state.open||!state.visible||document.hidden)state.animation.pause();
        else state.animation.resume();
    }
    function start(state){
        stop(state,false);
        if(motion.matches){stop(state);return;}
        state.svg.style.opacity='0';
        state.clock.time=0;state.render();
        // A finite timeline drives the approved absolute-time render functions.
        // GSAP owns the frame loop, interruption, pause and resume lifecycle.
        const timeline=window.gsap.timeline({paused:true,onComplete:()=>{state.animation=null;}});
        state.animation=timeline;
        timeline.to(state.svg,{opacity:1,duration:INTRO,ease:'power2.out'});
        timeline.to(state.clock,{time:state.demo.duration,duration:state.demo.duration,ease:'none',onUpdate:state.render});
        syncPlayback(state);
    }
    function syncPanels(){
        states.forEach(state=>{
            const open=!state.panel.hidden;
            if(open===state.open)return;
            state.open=open;
            if(open)start(state);else stop(state);
        });
    }
    section.addEventListener('capability:change',syncPanels);
    document.addEventListener('visibilitychange',()=>states.forEach(syncPlayback));
    const reduce=()=>states.forEach(state=>{if(motion.matches)stop(state);});
    if(motion.addEventListener)motion.addEventListener('change',reduce);else motion.addListener(reduce);
    if('IntersectionObserver' in window){
        const observer=new IntersectionObserver(entries=>entries.forEach(entry=>{
            const state=states.find(s=>s.host===entry.target);
            if(state){state.visible=entry.isIntersecting;syncPlayback(state);}
        }));
        states.forEach(state=>observer.observe(state.host));
    }
    syncPanels();
})();
