
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

$ne6_stack = [ 'WordPress', 'Divi', 'HTML', 'CSS', 'JavaScript', 'GA4', 'Google Tag Manager' ];

$ne6_work_areas = [
    [
        'title' => 'Design & Development',
        'details' => [
            [ 'label' => 'Planning', 'text' => 'New projects often start with a general idea of what the team wants. I\'m given a lot of freedom to work out what pages we need, how they fit together and what goes on them.' ],
            [ 'label' => 'Design', 'text' => 'I handle the page layouts and work out how the content should be presented on desktop and mobile.' ],
            [ 'label' => 'Development', 'text' => 'I build directly in WordPress using Divi and regularly write my own HTML, CSS and JavaScript to get the layout or functionality I need.' ],
            [ 'label' => 'Content', 'text' => 'I write much of the copy and create supporting imagery for the pages I build. I also work on SEO as I put the content together.' ],
        ],
    ],
    [
        'title' => 'Website Maintenance & Support',
        'details' => [
            [ 'label' => 'Maintenance', 'text' => 'I handle WordPress and plugin updates, keep backups and check that everything still works after changes.' ],
            [ 'label' => 'Troubleshooting', 'text' => 'When something breaks, I investigate the cause and make the necessary fixes. This often involves plugins, forms or layout issues.' ],
            [ 'label' => 'Publishing', 'text' => 'I developed the blog publishing workflow, including a simple Google Form for article submissions. I handle formatting, preparing imagery and reviewing content before it goes live.' ],
            [ 'label' => 'Testing', 'text' => 'I check pages across screen sizes and test their functionality before and after publishing.' ],
        ],
    ],
    [
        'title' => 'Analytics & Reporting',
        'details' => [
            [ 'label' => 'Tracking', 'text' => 'I set up tracking through Google Tag Manager and check that the data is coming through correctly in GA4.' ],
            [ 'label' => 'Analytics', 'text' => 'I look at where visitors are coming from, which pages they\'re visiting and how they\'re interacting with the site.' ],
            [ 'label' => 'Reporting', 'text' => 'I put together regular reports so the team can see how the website is performing and use that information when planning future work.' ],
        ],
    ],
    [
        'title' => 'Team & Project Coordination',
        'details' => [
            [ 'label' => 'Collaboration', 'text' => 'I work with people across the company to understand what they need from the website and help work out how to make it happen.' ],
            [ 'label' => 'Organization', 'text' => 'I use Trello, Slack and Google Workspace to manage requests, keep track of ongoing projects and communicate progress.' ],
            [ 'label' => 'Flexibility', 'text' => 'Working on a small team means I often take on work outside my usual responsibilities, including learning new tools and helping develop processes that make our work easier.' ],
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
            'title'  => 'Current Role',
            'id'     => 'ne6-heading',
        ]
    );
    ?>

    <div class="grid items-stretch gap-5 lg:grid-cols-5 lg:grid-rows-[auto_1fr_auto] lg:gap-x-8 lg:gap-y-0">

        <div class="flex min-w-0 flex-col gap-2 rounded-lg border border-border bg-white p-4 text-dark sm:p-5 lg:col-span-2 lg:col-start-4 lg:row-start-1 lg:rounded-b-none lg:border-b-0 lg:pb-4">
            <h3 class="text-2xl font-medium leading-tight md:text-3xl">WebOps at NE6</h3>
            <p class="text-sm leading-6 text-dark/75">
                At NE6, I work across the production site. I plan and build new sections, maintain what is already there, troubleshoot problems, and track how the site is performing.
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
                            <summary class="flex min-h-11 cursor-pointer list-none items-center justify-between gap-3 rounded-md px-3 py-2.5 focus-visible:ring-2 focus-visible:ring-inset focus-visible:ring-dark [&::-webkit-details-marker]:hidden">
                                <span class="flex min-w-0 flex-col gap-1">
                                    <span class="text-sm font-semibold text-dark">
                                        <?php echo esc_html( $area['title'] ); ?>
                                    </span>
                                </span>
                                <svg class="size-4 shrink-0 text-dark/70 transition-transform group-open:rotate-180 motion-reduce:transition-none"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                                    stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <path d="m6 9 6 6 6-6" />
                                </svg>
                            </summary>
                            <div class="border-t border-border px-3 py-3">
                                <ul class="list-disc space-y-4 pl-4 text-sm leading-6 text-dark/80">
                                    <?php foreach ( $area['details'] as $detail ) : ?>
                                        <li><strong><?php echo esc_html( $detail['label'] ); ?>:</strong> <?php echo esc_html( $detail['text'] ); ?></li>
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
