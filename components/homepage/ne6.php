
<?php
$ne6_gallery = [
    'desktop' => [
        [
            'file'    => 'assets/imgs/ne6-home-desktop.png',
            'subject' => 'home',
            'label'   => 'Homepage',
            'alt'     => 'Desktop screenshot of the NE6 homepage',
        ],
        [
            'file'    => 'assets/imgs/ne6-blog-desktop.png',
            'subject' => 'blog',
            'label'   => 'NE6 Blog',
            'alt'     => 'Desktop screenshot of the NE6 blog and article cards',
        ],
        [
            'file'    => 'assets/imgs/ne6-decision-framework-desktop.png',
            'subject' => 'decision-framework',
            'label'   => 'Decision Framework',
            'alt'     => 'Desktop screenshot of the NE6 five-question decision framework',
        ],
    ],
    'mobile' => [
        [
            'file'    => 'assets/imgs/ne6-home-mobile.png',
            'subject' => 'home',
            'label'   => 'Homepage',
            'alt'     => 'Mobile screenshot of the NE6 homepage',
        ],
        [
            'file'    => 'assets/imgs/ne6-blog-mobile.png',
            'subject' => 'blog',
            'label'   => 'NE6 Blog',
            'alt'     => 'Mobile screenshot of the NE6 blog and article cards',
        ],
        [
            'file'    => 'assets/imgs/ne6-decision-framework-mobile.png',
            'subject' => 'decision-framework',
            'label'   => 'Decision Framework',
            'alt'     => 'Mobile screenshot of the NE6 five-question decision framework',
        ],
    ],
];

foreach ( $ne6_gallery as $mode => $screenshots ) {
    $ne6_gallery[ $mode ] = array_values(
        array_filter(
            $screenshots,
            fn( $shot ) => file_exists( get_theme_file_path( $shot['file'] ) )
        )
    );
}

$ne6_initial_mode = ! empty( $ne6_gallery['desktop'] ) ? 'desktop' : 'mobile';
$ne6_has_screenshots = ! empty( $ne6_gallery[ $ne6_initial_mode ] );

// NE6-specific technologies. Keep the initial scan compact; details remain available below.
$ne6_stack = [
    'WordPress',
    'Divi',
    'GA4',
    'GTM',
    'HTML / CSS / JS',
];

// Short summaries do the scanning work; expanded panels preserve supporting detail.
// Wording is provisional until the site-wide copy review.
$ne6_work_areas = [
    [
        'title'   => 'Web Operations & Front-End',
        'summary' => 'Updates · fixes · responsive builds · custom features',
        'details' => [
            'Investigate plugin and form problems, layout issues, and production website requests.',
            'Standardize blog publishing from submissions and formatting through imagery, alt text, SEO, review, and release.',
            'Build custom page layouts and functionality when standard Divi modules cannot meet the requirements.',
            'Test implementations across devices before and after publishing.',
        ],
    ],
    [
        'title'   => 'Analytics & Reporting',
        'summary' => 'GA4 · GTM · tracking · reports',
        'details' => [
            'Implement and verify website measurement with Google Analytics 4 and Google Tag Manager.',
            'Prepare recurring reports to help the team understand traffic, engagement, and user behavior.',
        ],
    ],
    [
        'title'   => 'Website Initiatives',
        'summary' => 'Accessibility Program · blog hub',
        'details' => [
            'Built a seven-page Accessibility Program and blog hub, including navigation and content structure.',
            'Translate early ideas into page structures, user journeys, copy, imagery, and on-page SEO.',
            'Plan and publish connected website experiences supporting company initiatives.',
        ],
    ],
    [
        'title'   => 'Beyond the Role',
        'summary' => 'Cross-team work · learning unfamiliar tools',
        'details' => [
            'Coordinate requests across teams using Trello, Slack, and Google Workspace.',
            'Support content, imagery, and repeatable workflows when a project requires more than website development.',
        ],
    ],
];

?>

<section id="ne6" aria-labelledby="ne6-heading" class="section">

    <?php
    get_template_part(
        'components/section-heading',
        null,
        [
            'number' => '01',
            'title'  => 'Professional Work',
            'id'     => 'ne6-heading',
        ]
    );
    ?>

    <div class="grid items-stretch gap-5 lg:grid-cols-5 lg:grid-rows-[auto_1fr_auto] lg:gap-x-8 lg:gap-y-0">

        <div class="flex min-w-0 flex-col gap-2 rounded-lg border border-border bg-white p-4 text-dark sm:p-5 lg:col-span-2 lg:col-start-4 lg:row-start-1 lg:rounded-b-none lg:border-b-0 lg:pb-4">
            <h3 class="text-2xl font-medium leading-tight md:text-3xl">Production WebOps at NE6</h3>
            <p class="text-sm leading-6 text-dark/75">
                I operate and improve NE6's production WordPress website through
                day-to-day site support, front-end development, and analytics.
            </p>
        </div>

        <div
            data-ne6-gallery
            class="flex min-w-0 flex-col overflow-hidden rounded-lg border border-border bg-white text-dark shadow-lg lg:col-span-3 lg:col-start-1 lg:row-span-3 lg:row-start-1 lg:min-h-144"
        >

            <div class="flex items-center gap-4 border-b border-border px-4 py-3" aria-hidden="true">
                <div class="flex items-center gap-1.5">
                    <span class="size-2.5 rounded-full bg-muted-light"></span>
                    <span class="size-2.5 rounded-full bg-muted-light"></span>
                    <span class="size-2.5 rounded-full bg-muted-light"></span>
                </div>

                <div class="min-w-0 flex-1 rounded-md bg-light px-3 py-1 text-center text-xs text-dark/70">
                    llc.ne6.us
                </div>
            </div>

            <div class="relative aspect-4/3 min-h-0 overflow-hidden bg-light sm:aspect-video lg:aspect-auto lg:flex-1">

                <?php if ( ! $ne6_has_screenshots ) : ?>
                    <p class="absolute inset-0 flex items-center justify-center p-4 text-center text-sm text-dark/70">Screenshots are currently unavailable.</p>
                <?php endif; ?>

                <?php foreach ( $ne6_gallery as $mode => $screenshots ) : ?>
                    <?php foreach ( $screenshots as $index => $shot ) : ?>

                        <div
                            data-ne6-slide
                            data-ne6-mode="<?php echo esc_attr( $mode ); ?>"
                            data-ne6-subject="<?php echo esc_attr( $shot['subject'] ); ?>"
                            data-ne6-label="<?php echo esc_attr( $shot['label'] ); ?>"
                            class="absolute inset-0 <?php echo ( $ne6_initial_mode === $mode && 0 === $index ) ? '' : 'hidden'; ?>"
                        >

                            <?php if ( 'mobile' === $mode ) : ?>

                                <div class="flex h-full w-full items-center justify-center bg-light p-4">
                                    <div class="aspect-[9/19] h-full max-w-full overflow-hidden rounded-lg border border-border bg-white shadow-md">
                                        <img
                                            src="<?php echo esc_url( get_theme_file_uri( $shot['file'] ) ); ?>"
                                            alt="<?php echo esc_attr( $shot['alt'] ); ?>"
                                            class="h-full w-full object-cover object-top"
                                            loading="lazy"
                                        >
                                    </div>
                                </div>

                            <?php else : ?>

                                <img
                                    src="<?php echo esc_url( get_theme_file_uri( $shot['file'] ) ); ?>"
                                    alt="<?php echo esc_attr( $shot['alt'] ); ?>"
                                    class="h-full w-full object-cover object-top"
                                    loading="lazy"
                                >

                            <?php endif; ?>

                        </div>

                    <?php endforeach; ?>
                <?php endforeach; ?>

                <?php if ( $ne6_has_screenshots ) : ?>
                    <button
                        type="button"
                        data-ne6-previous
                        aria-label="Previous screenshot"
                        <?php disabled( count( $ne6_gallery[ $ne6_initial_mode ] ) < 2 ); ?>
                        class="absolute top-1/2 left-3 z-10 flex size-10 -translate-y-1/2 items-center justify-center rounded-full border border-dark bg-dark text-light shadow-sm transition-colors hover:bg-white hover:text-dark focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-dark disabled:opacity-30 motion-reduce:transition-none"
                    >
                        <svg class="size-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M19 12H5m7 7-7-7 7-7" />
                        </svg>
                    </button>

                    <button
                        type="button"
                        data-ne6-next
                        aria-label="Next screenshot"
                        <?php disabled( count( $ne6_gallery[ $ne6_initial_mode ] ) < 2 ); ?>
                        class="absolute top-1/2 right-3 z-10 flex size-10 -translate-y-1/2 items-center justify-center rounded-full border border-dark bg-dark text-light shadow-sm transition-colors hover:bg-white hover:text-dark focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-dark disabled:opacity-30 motion-reduce:transition-none"
                    >
                        <svg class="size-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M5 12h14m-7-7 7 7-7 7" />
                        </svg>
                    </button>

                <?php endif; ?>

            </div>

            <?php if ( $ne6_has_screenshots ) : ?>
                <div class="flex flex-wrap items-center justify-between gap-3 border-t border-border p-3">

                    <div
                        class="inline-flex items-center gap-1 rounded-md bg-light p-1"
                        role="group"
                        aria-label="Screenshot device"
                    >

                        <button
                            type="button"
                            data-ne6-view="desktop"
                            aria-pressed="<?php echo 'desktop' === $ne6_initial_mode ? 'true' : 'false'; ?>"
                            <?php disabled( empty( $ne6_gallery['desktop'] ) ); ?>
                            class="rounded-sm px-3 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 disabled:opacity-40 <?php echo 'desktop' === $ne6_initial_mode ? 'bg-dark text-light' : 'text-dark'; ?>"
                        >
                            Desktop
                        </button>

                        <button
                            type="button"
                            data-ne6-view="mobile"
                            aria-pressed="<?php echo 'mobile' === $ne6_initial_mode ? 'true' : 'false'; ?>"
                            <?php disabled( empty( $ne6_gallery['mobile'] ) ); ?>
                            class="rounded-sm px-3 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 disabled:opacity-40 <?php echo 'mobile' === $ne6_initial_mode ? 'bg-dark text-light' : 'text-dark'; ?>"
                        >
                            Mobile
                        </button>

                    </div>

                    <div class="flex flex-wrap items-center gap-2">

                        <?php foreach ( $ne6_gallery as $mode => $screenshots ) : ?>
                            <?php foreach ( $screenshots as $index => $shot ) : ?>

                                <button
                                    type="button"
                                    data-ne6-thumb
                                    data-ne6-mode="<?php echo esc_attr( $mode ); ?>"
                                    data-ne6-subject="<?php echo esc_attr( $shot['subject'] ); ?>"
                                    aria-label="<?php echo esc_attr( 'Show ' . $shot['label'] . ' screenshot' ); ?>"
                                    aria-pressed="<?php echo ( $ne6_initial_mode === $mode && 0 === $index ) ? 'true' : 'false'; ?>"
                                    class="size-12 overflow-hidden rounded-md border-2 p-0.5 focus-visible:outline-2 focus-visible:outline-offset-2 <?php echo ( $ne6_initial_mode === $mode && 0 === $index ) ? 'border-dark' : 'border-transparent'; ?> <?php echo $ne6_initial_mode !== $mode ? 'hidden' : ''; ?>"
                                >
                                    <img
                                        src="<?php echo esc_url( get_theme_file_uri( $shot['file'] ) ); ?>"
                                        alt=""
                                        class="h-full w-full rounded-sm object-cover object-top"
                                        loading="lazy"
                                    >
                                </button>

                            <?php endforeach; ?>
                        <?php endforeach; ?>

                    </div>

                    <p data-ne6-fallback class="hidden w-full text-xs text-dark/75"></p>
                    <p data-ne6-announcement class="sr-only" aria-live="polite" aria-atomic="true"></p>

                </div>
            <?php endif; ?>

        </div>

        <div class="min-w-0 rounded-lg border border-border bg-white p-4 text-dark shadow-sm sm:p-5 lg:col-span-2 lg:col-start-4 lg:row-start-2 lg:rounded-t-none lg:border-t-0 lg:pt-0 lg:shadow-none">

            <div class="flex flex-col gap-4">
                <ul class="flex flex-wrap gap-1.5" aria-label="Technologies used at NE6">
                    <?php foreach ( $ne6_stack as $technology ) : ?>
                        <li class="rounded-sm bg-dark/5 px-2.5 py-1 text-xs font-medium text-dark">
                            <?php echo esc_html( $technology ); ?>
                        </li>
                    <?php endforeach; ?>
                </ul>

                <div class="flex flex-col gap-2 border-t border-border pt-4">
                    <?php foreach ( $ne6_work_areas as $area ) : ?>
                        <details name="ne6-work" class="group overflow-hidden rounded-md border border-border bg-white open:border-muted">
                            <summary class="flex min-h-16 cursor-pointer list-none items-start justify-between gap-3 rounded-md px-3 py-2.5 focus-visible:ring-2 focus-visible:ring-inset focus-visible:ring-dark [&::-webkit-details-marker]:hidden">
                                <span class="flex min-w-0 flex-col gap-1">
                                    <span class="text-sm font-semibold text-dark">
                                        <?php echo esc_html( $area['title'] ); ?>
                                    </span>
                                    <span class="text-xs leading-5 text-dark/70 sm:text-[13px]">
                                        <?php echo esc_html( $area['summary'] ); ?>
                                    </span>
                                </span>
                                <svg class="mt-1 size-4 shrink-0 text-dark/70 transition-transform group-open:rotate-180 motion-reduce:transition-none"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                                    stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <path d="m6 9 6 6 6-6" />
                                </svg>
                            </summary>
                            <div class="border-t border-border px-3 py-3">
                                <ul class="list-disc space-y-2 pl-4 text-sm leading-5 text-dark/80">
                                    <?php foreach ( $area['details'] as $detail ) : ?>
                                        <li><?php echo esc_html( $detail ); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </details>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>

        <div class="self-start lg:col-span-2 lg:col-start-4 lg:row-start-3 lg:mt-4">
            <?php
            get_template_part(
                'components/button',
                null,
                [
                    'text'    => 'Visit NE6 website',
                    'url'     => 'https://llc.ne6.us/',
                    'variant' => 'light',
                ]
            );
            ?>
        </div>

    </div>

</section>

<script>
(() => {
    const gallery = document.querySelector('[data-ne6-gallery]');
    if (!gallery) return;

    const slides = [...gallery.querySelectorAll('[data-ne6-slide]')];
    if (!slides.length) return;

    const thumbnails = [...gallery.querySelectorAll('[data-ne6-thumb]')];
    const deviceButtons = [...gallery.querySelectorAll('[data-ne6-view]')];
    const previous = gallery.querySelector('[data-ne6-previous]');
    const next = gallery.querySelector('[data-ne6-next]');
    const announcement = gallery.querySelector('[data-ne6-announcement]');
    const fallback = gallery.querySelector('[data-ne6-fallback]');

    let mode = slides[0].dataset.ne6Mode;
    let subject = slides[0].dataset.ne6Subject;

    function availableSlides(device = mode) {
        return slides.filter(slide => slide.dataset.ne6Mode === device);
    }

    function currentSlide() {
        return availableSlides().find(slide => slide.dataset.ne6Subject === subject);
    }

    function render(message = '', announce = true) {
        const current = currentSlide();
        const currentSlides = availableSlides();

        slides.forEach(slide => {
            slide.classList.toggle('hidden', slide !== current);
        });

        thumbnails.forEach(thumb => {
            const sameMode = thumb.dataset.ne6Mode === mode;
            const selected = sameMode && thumb.dataset.ne6Subject === subject;

            thumb.classList.toggle('hidden', !sameMode);
            thumb.classList.toggle('border-dark', selected);
            thumb.classList.toggle('border-transparent', !selected);
            thumb.setAttribute('aria-pressed', String(selected));
        });

        deviceButtons.forEach(button => {
            const selected = button.dataset.ne6View === mode;

            button.setAttribute('aria-pressed', String(selected));
            button.classList.toggle('bg-dark', selected);
            button.classList.toggle('text-light', selected);
            button.classList.toggle('text-dark', !selected);
        });

        previous.disabled = currentSlides.length < 2;
        next.disabled = currentSlides.length < 2;
        fallback.textContent = message;
        fallback.classList.toggle('hidden', !message);

        if (announce) {
            announcement.textContent = message || `${current.dataset.ne6Label}, ${mode} screenshot`;
        }
    }

    deviceButtons.forEach(button => {
        button.addEventListener('click', () => {
            const targetMode = button.dataset.ne6View;
            const targetSlides = availableSlides(targetMode);
            if (targetMode === mode || !targetSlides.length) return;

            const oldLabel = currentSlide().dataset.ne6Label;
            const match = targetSlides.find(slide => slide.dataset.ne6Subject === subject);
            const target = match || targetSlides[0];
            mode = targetMode;
            subject = target.dataset.ne6Subject;

            render(match ? '' : `No ${mode} screenshot for ${oldLabel}. Showing ${target.dataset.ne6Label} instead.`);
        });
    });

    thumbnails.forEach(thumb => {
        thumb.addEventListener('click', () => {
            mode = thumb.dataset.ne6Mode;
            subject = thumb.dataset.ne6Subject;
            render();
        });
    });

    function move(direction) {
        const currentSlides = availableSlides();
        if (currentSlides.length < 2) return;

        const index = currentSlides.indexOf(currentSlide());
        const nextIndex = (index + direction + currentSlides.length) % currentSlides.length;
        subject = currentSlides[nextIndex].dataset.ne6Subject;
        render();
    }

    previous.addEventListener('click', () => move(-1));
    next.addEventListener('click', () => move(1));

    render('', false);
})();
</script>
