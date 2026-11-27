<?php
// Loaded in the footer; reuse the GSAP handle registered by the marquee.
$tools_script = '/assets/js/tools.js';
if ( is_readable( get_theme_file_path( $tools_script ) ) && wp_script_is( 'js-web-gsap', 'registered' ) ) {
    wp_enqueue_script(
        'js-web-tools',
        get_theme_file_uri( $tools_script ),
        [ 'js-web-gsap' ],
        filemtime( get_theme_file_path( $tools_script ) ),
        true
    );
}

$capabilities = [
    [
        'title' => 'WordPress & CMS',
        'skills' => 'WordPress · Divi · Elementor · PHP · Custom theme · CMS maintenance · Content publishing',
        'description' => 'I build and maintain WordPress websites, from content updates to custom layouts and functionality.',
        'demo' => 'WordPress Page Builder',
        'icons' => [
            [ 'type' => 'brand', 'slug' => 'wordpress' ],
            [ 'type' => 'brand', 'slug' => 'shopify' ],
            [ 'type' => 'brand', 'slug' => 'squarespace' ],
        ],
    ],
    [
        'title' => 'Front-End',
        'skills' => 'HTML · CSS · JavaScript · Tailwind CSS · GSAP · Responsive design',
        'description' => 'I use front-end code to implement responsive designs and build functionality beyond a CMS\'s defaults.',
        'demo' => 'Responsive Interfaces',
        'icons' => [
            [ 'type' => 'brand', 'slug' => 'html5' ],
            [ 'type' => 'brand', 'slug' => 'css' ],
            [ 'type' => 'brand', 'slug' => 'javascript' ],
        ],
    ],
    [
        'title' => 'Analytics & QA',
        'skills' => 'Google Analytics (GA4) · Google Tag Manager · SEO · Accessibility · Responsive QA · Performance testing',
        'description' => 'I work with analytics, tracking, testing, and accessibility to improve production websites.',
        'demo' => 'Analytics & QA Dashboard',
        'icons' => [
            [ 'type' => 'brand', 'slug' => 'googleanalytics' ],
            [ 'type' => 'brand', 'slug' => 'googletagmanager' ],
            [ 'type' => 'trending' ],
        ],
    ],
    [
        'title' => 'Additional Development',
        'skills' => 'React · Next.js · TypeScript · Node.js · SQL · Git · GitHub',
        'description' => 'I also build interactive applications and custom components using modern JavaScript frameworks.',
        'demo' => 'Application Components',
        'icons' => [
            [ 'type' => 'brand', 'slug' => 'react' ],
            [ 'type' => 'brand', 'slug' => 'nextdotjs' ],
            [ 'type' => 'brand', 'slug' => 'typescript' ],
            [ 'type' => 'brand', 'slug' => 'tailwindcss' ],
            [ 'type' => 'brand', 'slug' => 'github' ],
        ],
    ],
];
?>

<section id="capabilities" aria-labelledby="capabilities-heading" class="section">

    <?php
    get_template_part(
        'components/section-heading',
        null,
        [
            'number' => '03',
            'title' => 'Tools & Capabilities',
            'id' => 'capabilities-heading',
        ]
    );
    ?>

    <div class="flex flex-col gap-4">

        <?php foreach ( array_chunk( $capabilities, 2 ) as $row_index => $row ) : ?>

            <div class="grid gap-4 md:grid-cols-2">

                <?php foreach ( $row as $column_index => $capability ) : ?>

                    <?php
                    $index = $row_index * 2 + $column_index;
                    $trigger_id = 'capability-trigger-' . $index;
                    $panel_id = 'capability-panel-' . $index;
                    ?>

                    <button type="button" id="<?php echo esc_attr( $trigger_id ); ?>" data-capability-toggle
                        aria-expanded="false" aria-controls="<?php echo esc_attr( $panel_id ); ?>"
                        class="group flex w-full flex-col gap-3 rounded-lg bg-light p-5 text-left text-dark transition-colors hover:ring-1 hover:ring-border-dark focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-light aria-expanded:ring-2 aria-expanded:ring-muted motion-reduce:transition-none <?php echo 0 === $column_index ? 'md:col-start-1' : 'md:col-start-2'; ?> md:row-start-1">

                        <span class="flex w-full items-center gap-3">

                            <span class="flex min-w-0 flex-1 flex-wrap items-center gap-2">

                                <span class="text-base font-semibold">
                                    <?php echo esc_html( $capability['title'] ); ?>
                                </span>

                                <span class="flex flex-wrap items-center gap-2" aria-hidden="true">

                                    <?php foreach ( $capability['icons'] as $icon ) : ?>

                                        <?php if ( 'brand' === $icon['type'] ) : ?>

                                            <img src="<?php echo esc_url( 'https://cdn.simpleicons.org/' . $icon['slug'] . '/171717' ); ?>"
                                                alt="" class="size-5 shrink-0" loading="lazy">

                                        <?php elseif ( 'word' === $icon['type'] ) : ?>

                                            <span
                                                class="inline-flex h-5 shrink-0 items-center text-[11px] font-bold tracking-tight text-dark">
                                                <?php echo esc_html( $icon['text'] ); ?>
                                            </span>

                                        <?php elseif ( 'responsive' === $icon['type'] ) : ?>

                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75"
                                                stroke-linecap="round" stroke-linejoin="round" class="size-5 shrink-0 text-dark">
                                                <rect x="2" y="4" width="14" height="11" rx="1.5" />
                                                <path d="M7 19h5M9.5 15v4" />
                                                <rect x="18" y="8" width="4" height="11" rx="1" />
                                            </svg>

                                        <?php elseif ( 'accessibility' === $icon['type'] ) : ?>

                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75"
                                                stroke-linecap="round" stroke-linejoin="round" class="size-5 shrink-0 text-dark">
                                                <circle cx="12" cy="4" r="1.75" fill="currentColor" stroke="none" />
                                                <path d="M4 8l8 2 8-2M12 10v5m0 0-4 6m4-6 4 6" />
                                            </svg>

                                        <?php elseif ( 'trending' === $icon['type'] ) : ?>

                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75"
                                                stroke-linecap="round" stroke-linejoin="round" class="size-5 shrink-0 text-dark">
                                                <path d="M3 4v16h18M6 16l5-5 3 3 7-8M16 6h5v5" />
                                            </svg>

                                        <?php endif; ?>

                                    <?php endforeach; ?>

                                </span>

                            </span>

                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="size-5 shrink-0 text-dark/70 transition-transform duration-200 group-aria-expanded:rotate-180 motion-reduce:transition-none"
                                aria-hidden="true">
                                <path d="m6 9 6 6 6-6"></path>
                            </svg>

                        </span>

                        <span class="text-sm text-dark/75">
                            <?php echo esc_html( $capability['skills'] ); ?>
                        </span>

                    </button>

                    <div id="<?php echo esc_attr( $panel_id ); ?>" role="region"
                        aria-labelledby="<?php echo esc_attr( $trigger_id ); ?>"
                        class="rounded-lg border border-border bg-light p-4 text-dark md:col-span-2 md:row-start-2" hidden>

                        <div class="grid gap-5 md:grid-cols-2 md:items-center">

                            <div class="min-w-0 overflow-hidden rounded-md" data-capability-demo="<?php echo esc_attr( $index ); ?>" aria-hidden="true">
                                <img src="<?php echo esc_url( get_theme_file_uri( '/assets/svg/tools/' . $index . '.svg' ) ); ?>"
                                    alt="" width="360" height="240" style="display:block;width:100%;height:auto;" decoding="async">
                            </div>

                            <div class="flex flex-col gap-3">

                                <h4 class="font-semibold">
                                    <?php echo esc_html( $capability['demo'] ); ?>
                                </h4>

                                <p class="text-sm text-dark/75">
                                    <?php echo esc_html( $capability['description'] ); ?>
                                </p>

                            </div>

                        </div>

                    </div>

                <?php endforeach; ?>

            </div>

        <?php endforeach; ?>

    </div>

</section>

<script>
    (() => {
        const section = document.getElementById('capabilities');
        if (!section) return;

        const triggers = [
            ...section.querySelectorAll('[data-capability-toggle]')
        ];

        function closeAll() {
            triggers.forEach(trigger => {
                const panel = document.getElementById(
                    trigger.getAttribute('aria-controls')
                );

                trigger.setAttribute('aria-expanded', 'false');
                panel.hidden = true;
            });
        }

        triggers.forEach(trigger => {
            trigger.addEventListener('click', () => {
                if (window.jsWebInteractions?.toggleCapability(section, triggers, trigger)) return;

                const wasOpen =
                    trigger.getAttribute('aria-expanded') === 'true';

                const panel = document.getElementById(
                    trigger.getAttribute('aria-controls')
                );

                closeAll();

                if (!wasOpen) {
                    trigger.setAttribute('aria-expanded', 'true');
                    panel.hidden = false;
                }

                section.dispatchEvent(new Event('capability:change'));
            });
        });
    })();
</script>