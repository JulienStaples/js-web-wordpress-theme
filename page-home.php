<?php get_header(); ?>

<style>
    /* Match the marquee-to-01 gap below 04, before the footer border. */
    #main-content > #experience {
        padding-bottom: 4.25rem;
    }
    @media (min-width: 64rem) {
        #main-content > #experience {
            padding-bottom: 6.25rem;
        }
    }
    [data-home-entrance] {
        position: relative;
        isolation: isolate;
    }
    [data-home-entrance] [data-hero-copy] {
        position: relative;
        z-index: 1;
    }
    [data-home-entrance] [data-hero-logo] {
        position: absolute;
        inset: 0;
        z-index: 0;
        display: flex;
        align-items: center;
        justify-content: flex-end;
        overflow: hidden;
        pointer-events: none;
        user-select: none;
    }
    [data-home-entrance] [data-hero-logo] svg {
        display: block;
        flex: none;
        width: max(320px, 100vw);
        height: auto;
        max-width: none;
        max-height: none;
        margin-right: calc(-46vw);
        opacity: .07;
        transform-origin: center;
    }
    @media (min-width: 480px) {
        [data-home-entrance] [data-hero-logo] svg {
            /* Interpolate from the oversized phone crop to the tablet composition. */
            width: calc(41.666667vw + 280px);
            margin-right: calc(24.583333vw - 338.8px);
        }
    }
    @media (min-width: 768px) {
        [data-home-entrance] [data-hero-logo] svg {
            width: min(78.125vw, 1000px);
            /* Anchor to the same centered 1280px content width as .section.
               Keep the full hero as the clipping boundary so no hard edge
               appears inside the background on ultrawide screens. */
            margin-right: calc(max(0px, (100% - var(--container-page, 1280px)) / 2) - min(calc(5.859375vw + 105px), 180px));
        }
    }
    @media (min-width: 1024px) {
        [data-home-entrance] [data-hero-logo] svg {
            opacity: .11;
        }
    }
    /* The portrait is an overlay, not a layout resize. Keep the shared
       button press/hover rules from scaling its fixed-size trigger. */
    [data-home-entrance] [data-hero-greeting] {
        position: relative;
        z-index: 2;
        overflow: visible;
    }
    [data-home-entrance] [data-hero-profile] {
        position: relative;
        display: block;
        flex: 0 0 28px;
        width: 28px;
        height: 28px;
        padding: 0;
        border: 0;
        border-radius: 50%;
        background: transparent;
        overflow: visible;
        cursor: zoom-in;
        touch-action: manipulation;
        scale: 1 !important;
        transition: none !important;
    }
    [data-home-entrance] [data-hero-profile][aria-expanded="true"] {
        cursor: zoom-out;
    }
    [data-home-entrance] [data-hero-profile]:disabled {
        cursor: default;
    }
    [data-hero-profile] [data-profile-picture] {
        position: absolute;
        top: -66px;
        left: -66px;
        display: block;
        width: 160px;
        height: 160px;
        border-radius: 50%;
        overflow: hidden;
        pointer-events: auto;
        transform-origin: center;
        transform: translateX(0px) scale(.175);
        will-change: transform;
        transition: transform 120ms ease-out;
    }
    [data-hero-profile] [data-profile-picture] img {
        display: block;
        width: 100%;
        height: 100%;
        max-width: none;
        border-radius: 50%;
        object-fit: cover;
        object-position: 50% 0%;
    }
    [data-hero-profile][aria-expanded="true"] [data-profile-picture] {
        transform: translateX(var(--profile-edge-shift, 0px)) scale(1);
        box-shadow: 0 8px 24px #0005, 0 0 0 2px #fff;
        transition: transform 180ms cubic-bezier(.22,.8,.28,1.17);
    }
    @media (prefers-reduced-motion: reduce) {
        [data-hero-profile] [data-profile-picture] {
            transition: none !important;
        }
    }
</style>

<main id="main-content" tabindex="-1">

    <section data-home-entrance>
        <div class="section gap-8 md:flex-row md:items-center lg:gap-14 lg:py-16">

            <div data-hero-copy class="flex min-w-0 flex-1 flex-col items-start gap-8 lg:gap-10">
                <div data-hero-greeting class="inline-flex items-center gap-2 rounded-full bg-dark-surface px-3 py-2">
                    <button type="button" data-hero-profile aria-label="Enlarge profile picture" aria-expanded="false" disabled>
                        <span data-profile-picture>
                            <img
                                src="<?php echo esc_url( get_theme_file_uri( 'assets/imgs/me.png' ) ); ?>"
                                alt=""
                                width="393"
                                height="540"
                                loading="eager"
                                decoding="async"
                            >
                        </span>
                    </button>

                    <p class="text-xs text-muted-light">
                        Hey, nice to meet you.
                    </p>
                </div>


                <div class="flex flex-col gap-3">
                    <h1 class="tracking-tight">
                        I build websites. And keep them working.
                    </h1>

                    <p class="max-w-[64ch] text-base leading-6 text-muted-light">
                        My work touches every part of the website, from planning and content to maintenance and analytics.
                    </p>
                </div>

                <?php
                get_template_part(
                    'components/button',
                    null,
                    [
                        'text' => 'View resume',
                        'url' => get_theme_file_uri( 'assets/imgs/Julien-Staples-Resume.pdf' ),
                        'document_variant' => 'light',
                    ]
                );
                ?>
            </div>

            <!-- Preserve the desktop hero layout independently of the decorative watermark. -->
            <div aria-hidden="true" class="hidden shrink-0 md:block md:h-[305px] md:w-[245px] lg:h-[455px] lg:w-[390px]"></div>

            <div data-hero-logo aria-hidden="true">
                    <svg viewBox="0 0 9.8659888 9.8659876" focusable="false">
                        <g transform="matrix(0.0140242,0,0,0.0140242,-101.09697,34.90019)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round">
                            <circle data-logo-ring cx="7560.5" cy="-3197.834" r="336.24872" stroke-width="31" transform="translate(0,1061.0137)" />
                            <path data-logo-signature stroke-width="22.8177" transform="translate(0,1061.0137)"
                                d="m 7501.5549,-3273.9959 c 1.5367,30.1999 -28.3243,59.8021 -42.0218,66.1313 -27.2715,12.6016 -61.3519,-1.3103 -48.1856,-34.2645 11.1316,-27.8609 41.2865,-49.4973 62.146,-69.4312 26.1228,-24.9643 53.7863,-51.5502 73.4037,-82.055 9.3675,-14.5667 20.2739,-28.0391 24.5004,-44.9753 1.7664,-7.0783 3.8791,-19.2575 2.5194,-10.845 -1.0279,6.3597 -1.8009,9.8308 -2.7022,16.1455 -1.5462,10.8338 -4.7975,21.3151 -7.205,32.0102 -15.0606,66.9077 -22.1473,135.0311 -36.4772,201.9815 -15.3085,71.5263 -42.7681,150.6167 -99.9731,200.178 -10.1788,8.8192 -28.1665,19.6732 -41.4301,10.8206 -38.1775,-25.481 -12.2356,-76.905 11.7082,-102.7944 40.1243,-43.384 101.0911,-49.1397 154.0132,-67.1767 66.3432,-22.611 131.5892,-57.812 166.6223,-121.2789 13.1524,-23.8271 26.2378,-80.0802 -0.4505,-100.9908 -32.4841,-25.452 -91.5577,54.937 -94.1189,82.5057 -6.2536,67.2986 64.0159,110.8744 70.2511,168.6184 7.0419,65.2106 -40.7584,127.0562 -106.2775,135.2556 -14.2224,1.7796 -31.2373,1.658 -44.5824,-4.5085 -57.9665,-26.7846 9.7573,-118.7885 71.152,-110.0079 15.8011,2.26 33.499,13.0509 47.735,19.8374 49.3715,23.5377 94.8377,46.8947 151.3109,36.0684 19.7995,-3.7961 44.1189,-9.0038 58.993,-23.8951" />
                        </g>
                    </svg>
            </div>
        </div>
    </section>


    <script>
        (() => {
            'use strict';
            const hero = document.querySelector('[data-home-entrance]');
            const motion = window.matchMedia('(prefers-reduced-motion: reduce)');
            const navigation = performance.getEntriesByType?.('navigation')[0];
            // Leave deep links and history-restored pages immediately readable.
            if (!hero || motion.matches || !Element.prototype.animate ||
                location.hash || window.scrollY > 8 || navigation?.type === 'back_forward') return;

            const duration = 650;
            const stagger = 80;
            const spring = .35;
            const easing = `cubic-bezier(.22,.75,.32,${1 + .22 * spring})`;
            const copy = hero.querySelector('[data-hero-copy]');
            const animations = [];
            let active = true;
            let restoreLogo = () => {};

            function cleanup() {
                if (!active) return;
                active = false;
                window.removeEventListener('scroll', onScroll);
                window.removeEventListener('pageshow', onPageShow);
                window.removeEventListener('pagehide', cleanup);
                hero.removeEventListener('focusin', cleanup);
                motion.removeEventListener?.('change', onMotion);
                // No persistent animation styles: the unanimated markup is the final state.
                animations.forEach(animation => animation.cancel());
                restoreLogo();
            }
            function onScroll() {
                if (Math.abs(window.scrollY) > 8) cleanup();
            }
            function onPageShow(event) {
                if (event.persisted || Math.abs(window.scrollY) > 8) cleanup();
            }
            function onMotion(event) {
                if (event.matches) cleanup();
            }
            function enter(element, transform, delay, time) {
                if (!element || !element.getClientRects().length) return;
                animations.push(element.animate([
                    { transform }, { transform: 'translate(0,0) scale(1)' }
                ], { duration: time, delay, easing, fill: 'backwards' }));
                animations.push(element.animate([
                    { opacity: 0 }, { opacity: 1 }
                ], { duration: time * .85, delay, easing: 'ease-out', fill: 'backwards' }));
            }

            // Decorative watermark: each freshly drawn portion develops opacity
            // over 700ms. Composite the temporary white strokes inside the same
            // SVG so its responsive 7% / 11% opacity remains the maximum.
            function drawLogo() {
                const container = hero.querySelector('[data-hero-logo]');
                if (!container || !container.getClientRects().length) return;
                const logo = container.querySelector('svg');
                const original = logo.querySelector('g');
                if (!original) return;
                const paths = Array.from(original.querySelectorAll('[data-logo-ring], [data-logo-signature]'));
                if (paths.length !== 2) return;
                const lengths = paths.map(path => path.getTotalLength());
                const drawDuration = 1700;
                const signatureDelay = 700;
                const dryingDuration = 700;
                const drawEase = 'cubic-bezier(.333333,0,.666667,1)';
                const count = 32;
                const layers = [];
                const originalDisplay = original.style.display;
                restoreLogo = () => {
                    layers.forEach(layer => layer.remove());
                    original.style.display = originalDisplay;
                };

                const fragment = document.createDocumentFragment();
                for (let i = 0; i < count; i++) {
                    const layer = original.cloneNode(true);
                    // Source-over alpha: the first k layers combine to k/count,
                    // so the developing stroke stays below its final opacity.
                    layer.setAttribute('opacity', String(1 / (count - i)));
                    layer.setAttribute('data-logo-ink-layer', '');
                    const copies = Array.from(layer.children);
                    copies.forEach((path, j) => {
                        path.removeAttribute('data-logo-ring');
                        path.removeAttribute('data-logo-signature');
                        const length = lengths[j];
                        path.style.strokeDasharray = `${length} ${length}`;
                        path.style.strokeDashoffset = String(length);
                        path.style.opacity = '0';
                    });
                    fragment.appendChild(layer);
                    layers.push(layer);
                }
                logo.appendChild(fragment);
                original.style.display = 'none';

                layers.forEach((layer, i) => {
                    const age = dryingDuration * (i + 1) / count;
                    Array.from(layer.children).forEach((path, j) => {
                        const length = lengths[j];
                        animations.push(path.animate([
                            { strokeDashoffset: String(length), opacity: 0 },
                            { strokeDashoffset: String(length), opacity: 1, offset: .001 },
                            { strokeDashoffset: '0', opacity: 1 }
                        ], {
                            duration: drawDuration,
                            delay: age + (j === 1 ? signatureDelay : 0),
                            easing: drawEase,
                            fill: 'both'
                        }));
                    });
                });
            }

            // Run immediately after the hero is parsed, rather than waiting for images.
            // Header and marquee own their own motion and are never targeted here.
            try {
                window.addEventListener('scroll', onScroll, { passive: true });
                window.addEventListener('pageshow', onPageShow);
                window.addEventListener('pagehide', cleanup);
                hero.addEventListener('focusin', cleanup);
                motion.addEventListener?.('change', onMotion);
                enter(hero.querySelector('[data-hero-greeting]'), 'translateY(12px) scale(.96)', 0, duration);
                enter(copy?.querySelector('h1'), 'translateY(16px)', stagger, duration);
                enter(copy?.querySelector('h1 + p'), 'translateY(14px)', stagger * 2, duration);
                enter(copy?.querySelector(':scope > a'), 'translateY(10px) scale(.96)', stagger * 3, duration);
                drawLogo();
                Promise.allSettled(animations.map(animation => animation.finished)).then(cleanup);
            } catch (error) {
                cleanup();
            }
        })();
    </script>

    <script>
        (() => {
            'use strict';
            const button = document.querySelector('[data-hero-profile]');
            if (!button) return;
            let pinned = false;

            function fitPortrait() {
                // Preserve vertical center and avoid clipping at viewport edges.
                const rect = button.getBoundingClientRect();
                const center = rect.left + rect.width / 2;
                const safeCenter = Math.max(82, Math.min(document.documentElement.clientWidth - 82, center));
                button.style.setProperty('--profile-edge-shift', `${safeCenter - center}px`);
            }
            function setExpanded(expanded) {
                if (expanded) fitPortrait();
                button.setAttribute('aria-expanded', String(expanded));
                button.setAttribute('aria-label', expanded ? 'Collapse profile picture' : 'Enlarge profile picture');
            }
            function close() {
                pinned = false;
                setExpanded(false);
            }
            // Pointer type, rather than viewport width, handles hybrid laptops
            // and touch devices without introducing a synthetic hover delay.
            button.addEventListener('pointerenter', event => {
                if (event.pointerType === 'mouse') setExpanded(true);
            });
            button.addEventListener('pointerleave', event => {
                if (event.pointerType === 'mouse' && !pinned) setExpanded(false);
            });
            // Native button activation supports touch and Enter/Space as well.
            button.addEventListener('click', () => {
                pinned = !pinned;
                setExpanded(pinned);
            });
            document.addEventListener('pointerdown', event => {
                if (!button.contains(event.target)) close();
            }, true);
            button.addEventListener('blur', close);
            document.addEventListener('keydown', event => {
                if (event.key === 'Escape' && button.getAttribute('aria-expanded') === 'true') close();
            });
            window.addEventListener('resize', () => {
                if (button.getAttribute('aria-expanded') === 'true') fitPortrait();
            }, { passive: true });
            window.addEventListener('pagehide', close);
            button.disabled = false;
        })();
    </script>

    <?php get_template_part( 'components/homepage/marquee' ); ?>

    <?php get_template_part( 'components/homepage/ne6' ); ?>

    <?php get_template_part( 'components/homepage/projects' ); ?>

    <?php get_template_part( 'components/homepage/tools' ); ?>

    <?php get_template_part( 'components/homepage/experience' ); ?>
</main>

<script>
    (() => {
        'use strict';
        const motion = window.matchMedia('(prefers-reduced-motion: reduce)');
        const duration = 1100;
        const stagger = 110;
        const easing = 'cubic-bezier(.22,.75,.32,1.077)'; // Same 35% spring as the hero.

        function init() {
            if (motion.matches || !window.IntersectionObserver || !Element.prototype.animate) return;
            const pending = new Map();
            const active = new Map();
            const groups = new Map();
            const ne6Desktop = window.matchMedia('(min-width: 64rem)');
            const sections = new Set();
            let observer;
            let stopped = false;
            const initiallyAtTop = Math.abs(window.scrollY) <= 8;
            const navigation = performance.getEntriesByType?.('navigation')[0];

            function add(section, elements) {
                if (!section) return;
                sections.add(section);
                elements.filter(Boolean).forEach(element => {
                    if (!element.getClientRects().length || pending.has(element)) return;
                    // At the top of a normal page load, animate even the visible portion of NE6.
                    // If the browser already restored a lower position, leave visible content alone.
                    const bounds = element.getBoundingClientRect();
                    if (bounds.bottom <= 0 || (!initiallyAtTop && bounds.top < window.innerHeight)) return;
                    pending.set(element, section);
                });
            }

            const ne6 = document.getElementById('ne6');
            const gallery = ne6?.querySelector('[data-ne6-gallery]');
            const ne6Grid = gallery?.parentElement;
            const ne6Items = Array.from(ne6Grid?.children || []);
            const intro = gallery?.previousElementSibling;
            const details = gallery?.nextElementSibling;
            // At lg the intro and details form one continuous white panel.
            // Use one observer target and one stagger slot for both halves.
            if (ne6Desktop.matches && intro && details) {
                groups.set(intro, [intro, details]);
            }
            add(ne6, [ne6?.querySelector('.homepage-section-heading'),
                ...ne6Items.filter(element => !(groups.has(intro) && element === details))]);

            const projects = document.getElementById('projects');
            const selector = projects?.querySelector('#project-selector');
            const projectHeading = projects?.querySelector('.homepage-section-heading')?.parentElement?.parentElement;
            // Desktop has display:contents; mobile has a horizontal selector strip.
            const cards = selector && getComputedStyle(selector).display === 'contents'
                ? Array.from(selector.children) : [selector];
            add(projects, [projectHeading, ...cards, projects?.querySelector('#project-spotlight')]);

            const tools = document.getElementById('capabilities');
            add(tools, [tools?.querySelector('.homepage-section-heading'), ...Array.from(tools?.querySelectorAll('[data-capability-toggle]') || [])]);

            const experience = document.getElementById('experience');
            const timeline = experience?.querySelector('article')?.parentElement;
            add(experience, [experience?.querySelector('.homepage-section-heading'), ...Array.from(timeline?.children || [])]);


            function finish(element) {
                const item = active.get(element);
                if (!item) return;
                active.delete(element);
                item.animations.forEach(animation => animation.cancel());
                observer?.unobserve(element);
            }
            function forget(element) {
                pending.delete(element);
                observer?.unobserve(element);
            }
            function reveal(element, delay) {
                const section = pending.get(element);
                pending.delete(element);
                // Observe only the first entry; the animated translation must not retrigger it.
                observer.unobserve(element);
                if (!section || stopped) return;
                const animations = [];
                active.set(element, {section, animations});
                try {
                    // The paired NE6 surfaces share exactly the same timing and translation.
                    // Individual translate preserves hover/press transform and scale rules.
                    for (const target of groups.get(element) || [element]) {
                        animations.push(target.animate([
                            { translate: '0 12px' }, { translate: '0 0' }
                        ], { duration, delay, easing, fill: 'backwards' }));
                        animations.push(target.animate([
                            { opacity: 0 }, { opacity: 1 }
                        ], { duration: duration * .85, delay, easing: 'ease-out', fill: 'backwards' }));
                    }
                    Promise.allSettled(animations.map(animation => animation.finished)).then(() => finish(element));
                } catch (error) {
                    finish(element);
                }
            }
            function clearSection(section) {
                for (const [element, owner] of pending) if (owner === section) forget(element);
                for (const [element, item] of active) if (item.section === section) finish(element);
            }
            function stop() {
                if (stopped) return;
                stopped = true;
                observer?.disconnect();
                pending.clear();
                for (const element of active.keys()) finish(element);
                sections.forEach(section => {
                    section.removeEventListener('pointerdown', onInteraction, true);
                    section.removeEventListener('focusin', onInteraction, true);
                    section.removeEventListener('click', onInteraction, true);
                });
                motion.removeEventListener?.('change', onMotion);
                ne6Desktop.removeEventListener?.('change', onNe6Layout);
                window.removeEventListener('pagehide', stop);
                window.removeEventListener('pageshow', onPageShow);
                document.removeEventListener('DOMContentLoaded', registerContact);
            }
            function onInteraction(event) {
                // Finish entrances before measuring or moving any interactive panels.
                clearSection(event.currentTarget);
            }
            function onMotion(event) { if (event.matches) stop(); }
            function onNe6Layout() { if (ne6) clearSection(ne6); }
            function onPageShow(event) {
                if (event.persisted) { stop(); return; }
                // Reload scroll restoration can occur after this inline script runs.
                if (navigation?.type === 'reload' && initiallyAtTop && Math.abs(window.scrollY) > 8) {
                    for (const element of active.keys()) finish(element);
                    for (const element of pending.keys()) {
                        if (element.getBoundingClientRect().top < window.innerHeight) forget(element);
                    }
                }
            }
            function bindSection(section) {
                section.addEventListener('pointerdown', onInteraction, true);
                section.addEventListener('focusin', onInteraction, true);
                section.addEventListener('click', onInteraction, true);
            }
            function registerTargets(elements) {
                const counts = new Map();
                elements.sort((a, b) => a.getBoundingClientRect().top - b.getBoundingClientRect().top || a.getBoundingClientRect().left - b.getBoundingClientRect().left);
                for (const element of elements) {
                    const section = pending.get(element);
                    if (!section) continue;
                    const bounds = element.getBoundingClientRect();
                    // Start already-visible elements immediately, rather than waiting for images or pageshow.
                    if (initiallyAtTop && Math.abs(window.scrollY) <= 8 && bounds.top < window.innerHeight && bounds.bottom > 0) {
                        const index = counts.get(section) || 0;
                        counts.set(section, index + 1);
                        reveal(element, Math.min(index, 3) * stagger);
                    } else observer.observe(element);
                }
            }
            function registerContact() {
                if (stopped) return;
                const contact = document.getElementById('footer');
                if (!contact) return;
                const row = contact.querySelector('#contact-heading')?.parentElement?.parentElement;
                add(contact, Array.from(row?.children || []));
                bindSection(contact);
                registerTargets(Array.from(pending).filter(([, section]) => section === contact).map(([element]) => element));
            }
            observer = new IntersectionObserver(entries => {
                const counts = new Map();
                entries.sort((a, b) => a.boundingClientRect.top - b.boundingClientRect.top || a.boundingClientRect.left - b.boundingClientRect.left);
                entries.forEach(entry => {
                    const element = entry.target;
                    if (!entry.isIntersecting) {
                        if (entry.boundingClientRect.bottom <= 0) forget(element);
                        return;
                    }
                    const section = pending.get(element);
                    if (!section) return;
                    // Initial observer notifications can arrive after browser scroll restoration.
                    if (document.activeElement && element.contains(document.activeElement)) {
                        forget(element); return;
                    }
                    const index = counts.get(section) || 0;
                    counts.set(section, index + 1);
                    reveal(element, Math.min(index, 3) * stagger);
                });
            }, { rootMargin: '0px 0px 24px 0px', threshold: 0 });
            sections.forEach(bindSection);
            motion.addEventListener?.('change', onMotion);
            ne6Desktop.addEventListener?.('change', onNe6Layout);
            window.addEventListener('pagehide', stop, { once: true });
            window.addEventListener('pageshow', onPageShow);
            registerTargets(Array.from(pending.keys()));
            // Footer is parsed after this script; register it separately without delaying the main sections.
            if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', registerContact, { once: true });
            else registerContact();
        }

        // Match the hero: initialize as soon as the main markup is available.
        // A history-restored or deep-linked page remains static until the next navigation.
        const navigation = performance.getEntriesByType?.('navigation')[0];
        if (navigation?.type !== 'back_forward' && !location.hash) init();
    })();
</script>

<?php get_template_part( 'components/homepage/screenshot-viewer' ); ?>

<?php get_footer(); ?>