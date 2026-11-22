
<?php
$ne6_gallery = [
    'desktop' => [
        [
            'file'  => 'assets/imgs/ne6.png',
            'label' => 'Homepage',
            'alt'   => 'Desktop screenshot of the NE6 homepage',
        ],
        [
            'file'  => 'assets/imgs/ne6-accessibility.png',
            'label' => 'Accessibility Program',
            'alt'   => 'Desktop screenshot of the NE6 Accessibility Program',
        ],
    ],
    'mobile' => [
        [
            'file'  => 'assets/imgs/ne6-mobile.png',
            'label' => 'Homepage',
            'alt'   => 'Mobile screenshot of the NE6 homepage',
        ],
        [
            'file'  => 'assets/imgs/ne6-accessibility-mobile.png',
            'label' => 'Accessibility Program',
            'alt'   => 'Mobile screenshot of the NE6 Accessibility Program',
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

    <div class="grid gap-8 lg:grid-cols-5 lg:grid-rows-[auto_1fr_auto]">

        <div class="flex flex-col gap-3 lg:col-span-2 lg:col-start-4 lg:row-start-1">
            <h3 class="text-2xl font-medium md:text-3xl">Production WebOps at NE6</h3>

            <p class="text-muted-light">
                I maintain NE6's production WordPress website and
                build new pages and custom features when needed.
            </p>
        </div>

        <div
            data-ne6-gallery
            class="order-first flex min-w-0 flex-col overflow-hidden rounded-lg border border-border bg-white text-dark shadow-lg lg:order-none lg:col-span-3 lg:col-start-1 lg:row-span-3 lg:row-start-1 lg:min-h-144"
        >

            <div class="flex items-center gap-4 border-b border-border px-4 py-3" aria-hidden="true">
                <div class="flex items-center gap-1.5">
                    <span class="size-2.5 rounded-full bg-muted-light"></span>
                    <span class="size-2.5 rounded-full bg-muted-light"></span>
                    <span class="size-2.5 rounded-full bg-muted-light"></span>
                </div>

                <div class="min-w-0 flex-1 rounded-md bg-light px-3 py-1 text-center text-xs text-muted">
                    llc.ne6.us
                </div>
            </div>

            <div class="relative aspect-4/3 min-h-0 overflow-hidden bg-light sm:aspect-video lg:aspect-auto lg:flex-1">

                <?php foreach ( $ne6_gallery as $mode => $screenshots ) : ?>
                    <?php foreach ( $screenshots as $index => $shot ) : ?>

                        <div
                            data-ne6-slide
                            data-ne6-mode="<?php echo esc_attr( $mode ); ?>"
                            data-ne6-index="<?php echo esc_attr( $index ); ?>"
                            data-ne6-label="<?php echo esc_attr( $shot['label'] ); ?>"
                            class="absolute inset-0 <?php echo ( 'desktop' === $mode && 0 === $index ) ? '' : 'hidden'; ?>"
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

                <button
                    type="button"
                    data-ne6-previous
                    aria-label="Previous screenshot"
                    class="absolute top-1/2 left-3 z-10 flex size-10 -translate-y-1/2 items-center justify-center rounded-full bg-white/90 text-dark shadow-sm transition-colors hover:bg-white focus-visible:outline-2 focus-visible:outline-offset-2 disabled:opacity-30 motion-reduce:transition-none"
                >
                    <span aria-hidden="true">←</span>
                </button>

                <button
                    type="button"
                    data-ne6-next
                    aria-label="Next screenshot"
                    class="absolute top-1/2 right-3 z-10 flex size-10 -translate-y-1/2 items-center justify-center rounded-full bg-white/90 text-dark shadow-sm transition-colors hover:bg-white focus-visible:outline-2 focus-visible:outline-offset-2 disabled:opacity-30 motion-reduce:transition-none"
                >
                    <span aria-hidden="true">→</span>
                </button>

                <p data-ne6-announcement class="sr-only" aria-live="polite"></p>

            </div>

            <div class="flex flex-wrap items-center justify-between gap-3 border-t border-border p-3">

                <div
                    class="inline-flex items-center gap-1 rounded-md bg-light p-1"
                    role="group"
                    aria-label="Screenshot device"
                >

                    <button
                        type="button"
                        data-ne6-view="desktop"
                        aria-pressed="true"
                        class="rounded-sm bg-dark px-3 py-2 text-sm text-light focus-visible:outline-2 focus-visible:outline-offset-2"
                    >
                        Desktop
                    </button>

                    <button
                        type="button"
                        data-ne6-view="mobile"
                        aria-pressed="false"
                        <?php disabled( empty( $ne6_gallery['mobile'] ) ); ?>
                        class="rounded-sm px-3 py-2 text-sm text-dark focus-visible:outline-2 focus-visible:outline-offset-2 disabled:opacity-40"
                    >
                        Mobile
                    </button>

                </div>

                <div class="flex items-center gap-2">

                    <?php foreach ( $ne6_gallery as $mode => $screenshots ) : ?>
                        <?php foreach ( $screenshots as $index => $shot ) : ?>

                            <button
                                type="button"
                                data-ne6-thumb
                                data-ne6-mode="<?php echo esc_attr( $mode ); ?>"
                                data-ne6-index="<?php echo esc_attr( $index ); ?>"
                                aria-label="<?php echo esc_attr( 'Show ' . $shot['label'] . ' screenshot' ); ?>"
                                aria-pressed="<?php echo ( 'desktop' === $mode && 0 === $index ) ? 'true' : 'false'; ?>"
                                class="size-12 overflow-hidden rounded-md border-2 border-transparent p-0.5 focus-visible:outline-2 focus-visible:outline-offset-2 <?php echo 'mobile' === $mode ? 'hidden' : ''; ?>"
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

            </div>

        </div>

        <div class="overflow-hidden rounded-lg border border-border bg-light text-dark shadow-sm lg:col-span-2 lg:col-start-4 lg:row-start-2 lg:self-center">

            <div class="border-b border-border p-5">
                <h4 class="text-base font-semibold">
                    Scope of Work
                </h4>
            </div>

            <div class="p-5">
                <h5 class="text-base font-semibold">
                    Website Operations
                </h5>

                <p class="mt-2 text-sm text-dark/75">
                    Updates, backups, forms, testing,
                    troubleshooting, and ongoing fixes.
                </p>
            </div>

            <div class="border-t border-border p-5">
                <h5 class="text-base font-semibold">
                    Front-End Development
                </h5>

                <p class="mt-2 text-sm text-dark/75">
                    New pages, responsive layouts, and custom code
                    when Divi can't meet a requirement.
                </p>
            </div>

            <div class="border-t border-border p-5">
                <h5 class="text-base font-semibold">
                    Accessibility Program
                </h5>

                <p class="mt-2 text-sm text-dark/75">
                    Built a seven-page section with its own navigation,
                    content, imagery, and blog hub.
                </p>
            </div>

        </div>

        <div class="self-start lg:col-span-2 lg:col-start-4 lg:row-start-3">

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
    const thumbnails = [...gallery.querySelectorAll('[data-ne6-thumb]')];
    const deviceButtons = [...gallery.querySelectorAll('[data-ne6-view]')];

    const previous = gallery.querySelector('[data-ne6-previous]');
    const next = gallery.querySelector('[data-ne6-next]');
    const announcement = gallery.querySelector('[data-ne6-announcement]');

    let mode = 'desktop';
    let active = 0;

    function availableSlides() {
        return slides.filter(slide => slide.dataset.ne6Mode === mode);
    }

    function render() {
        const currentSlides = availableSlides();
        if (!currentSlides.length) return;

        active = (active + currentSlides.length) % currentSlides.length;

        slides.forEach(slide => {
            const selected =
                slide.dataset.ne6Mode === mode &&
                Number(slide.dataset.ne6Index) === active;

            slide.classList.toggle('hidden', !selected);
        });

        thumbnails.forEach(thumb => {
            const sameMode = thumb.dataset.ne6Mode === mode;
            const selected =
                sameMode && Number(thumb.dataset.ne6Index) === active;

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
    }

    function announce() {
        const current = availableSlides()[active];

        if (current) {
            announcement.textContent =
                `${current.dataset.ne6Label}, ${mode} screenshot`;
        }
    }

    deviceButtons.forEach(button => {
        button.addEventListener('click', () => {
            mode = button.dataset.ne6View;
            active = 0;

            render();
            announce();
        });
    });

    thumbnails.forEach(thumb => {
        thumb.addEventListener('click', () => {
            mode = thumb.dataset.ne6Mode;
            active = Number(thumb.dataset.ne6Index);

            render();
            announce();
        });
    });

    previous.addEventListener('click', () => {
        active--;
        render();
        announce();
    });

    next.addEventListener('click', () => {
        active++;
        render();
        announce();
    });

    render();
})();
</script>
