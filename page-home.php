<?php get_header(); ?>

<main id="main-content" tabindex="-1">

    <section data-home-entrance>
        <div class="section gap-8 md:flex-row md:items-center lg:gap-14 lg:py-16">

            <div data-hero-copy class="flex min-w-0 flex-1 flex-col items-start gap-8 lg:gap-10">
                <div data-hero-greeting class="inline-flex items-center gap-2 rounded-full bg-dark-surface px-3 py-2">
                    <?php
                    echo wp_get_attachment_image(
                        14,
                        'thumbnail',
                        false,
                        [
                            'class' => 'size-7 shrink-0 rounded-full object-cover',
                            'alt' => '',
                        ]
                    );
                    ?>

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

            <div data-hero-portrait
                class="hidden shrink-0 overflow-hidden rounded-lg bg-[#454545] md:block md:h-[305px] md:w-[245px] lg:h-[455px] lg:w-[390px]">
                <?php
                echo wp_get_attachment_image(
                    14,
                    'full',
                    false,
                    [
                        'class' => 'h-full w-full object-cover',
                        'loading' => 'eager',
                        'fetchpriority' => 'high',
                    ]
                );
                ?>
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
                enter(hero.querySelector('[data-hero-portrait]'), 'translateX(16px) scale(.975)', stagger, duration * 1.15);
                Promise.allSettled(animations.map(animation => animation.finished)).then(cleanup);
            } catch (error) {
                cleanup();
            }
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

<?php get_footer(); ?>