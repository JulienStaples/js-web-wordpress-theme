<?php
$capabilities = [
    [
        'title' => 'WordPress & CMS',
        'skills' => 'WordPress · Divi · Elementor · content publishing · plugins and forms',
        'description' => 'I build and maintain WordPress websites, from content updates to custom layouts and functionality.',
        'demo' => 'WordPress Page Builder',
        'logos' => [
            'https://cdn.simpleicons.org/wordpress/f7f7f7',
            'https://cdn.simpleicons.org/elementor/f7f7f7',
        ],
    ],
    [
        'title' => 'Front-End',
        'skills' => 'HTML · CSS · JavaScript · PHP · responsive implementation',
        'description' => 'I use front-end code to implement responsive designs and build functionality beyond a CMS\'s defaults.',
        'demo' => 'Code to Website',
        'logos' => [
            'https://cdn.simpleicons.org/html5/f7f7f7',
            'https://cdn.simpleicons.org/javascript/f7f7f7',
            'https://cdn.simpleicons.org/php/f7f7f7',
        ],
    ],
    [
        'title' => 'Analytics & QA',
        'skills' => 'GA4 · Google Tag Manager · on-page SEO · accessibility · responsive QA',
        'description' => 'I work with analytics, tracking, testing, and accessibility to improve production websites.',
        'demo' => 'Analytics & QA Dashboard',
        'logos' => [
            'https://cdn.simpleicons.org/googleanalytics/f7f7f7',
            'https://cdn.simpleicons.org/googletagmanager/f7f7f7',
        ],
    ],
    [
        'title' => 'Additional Development',
        'skills' => 'React · Next.js · TypeScript · Tailwind CSS · Git/GitHub',
        'description' => 'I also build interactive applications and custom components using modern JavaScript frameworks.',
        'demo' => 'Application Components',
        'logos' => [
            'https://cdn.simpleicons.org/react/f7f7f7',
            'https://cdn.simpleicons.org/nextdotjs/f7f7f7',
            'https://cdn.simpleicons.org/typescript/f7f7f7',
        ],
    ],
];
?>

<section id="capabilities" aria-labelledby="capabilities-heading" class="bg-dark text-light">

    <div class="section gap-6">

        <div class="flex items-center gap-6">
            <h2 id="capabilities-heading">
                Tools &amp; Capabilities
            </h2>

            <hr class="h-px min-w-0 flex-1 border-0 bg-border-dark" aria-hidden="true">
        </div>

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
                            class="group flex w-full flex-col gap-3 rounded-lg bg-dark-surface p-5 text-left transition-colors hover:ring-1 hover:ring-border-dark focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-light aria-expanded:ring-1 aria-expanded:ring-muted motion-reduce:transition-none <?php echo 0 === $column_index ? 'md:col-start-1' : 'md:col-start-2'; ?> md:row-start-1">

                            <div class="flex w-full items-center gap-3">

                                <div class="flex min-w-0 flex-1 flex-wrap items-center gap-2">

                                    <h3 class="text-base font-semibold">
                                        <?php echo esc_html( $capability['title'] ); ?>
                                    </h3>

                                    <div class="flex items-center gap-2" aria-hidden="true">

                                        <?php foreach ( $capability['logos'] as $logo ) : ?>

                                            <img src="<?php echo esc_url( $logo ); ?>" alt="" class="size-5" loading="lazy">

                                        <?php endforeach; ?>

                                    </div>

                                </div>

                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="size-5 shrink-0 text-muted-light transition-transform duration-200 group-aria-expanded:rotate-180 motion-reduce:transition-none"
                                    aria-hidden="true">
                                    <path d="m6 9 6 6 6-6"></path>
                                </svg>

                            </div>

                            <p class="text-sm text-muted-light">
                                <?php echo esc_html( $capability['skills'] ); ?>
                            </p>

                        </button>

                        <div id="<?php echo esc_attr( $panel_id ); ?>" role="region"
                            aria-labelledby="<?php echo esc_attr( $trigger_id ); ?>"
                            class="rounded-lg border border-border-dark bg-dark-surface p-4 md:col-span-2 md:row-start-2"
                            hidden>

                            <div class="grid gap-5 md:grid-cols-2 md:items-center">

                                <div
                                    class="flex min-h-48 flex-col items-center justify-center gap-3 rounded-md border border-border-dark bg-dark p-4">

                                    <span class="text-xs text-muted-light">
                                        Animation Placeholder
                                    </span>

                                    <p class="text-center font-medium">
                                        <?php echo esc_html( $capability['demo'] ); ?>
                                    </p>

                                </div>

                                <div class="flex flex-col gap-3">

                                    <h4 class="font-semibold">
                                        <?php echo esc_html( $capability['demo'] ); ?>
                                    </h4>

                                    <p class="text-sm text-muted-light">
                                        <?php echo esc_html( $capability['description'] ); ?>
                                    </p>

                                </div>

                            </div>

                        </div>

                    <?php endforeach; ?>

                </div>

            <?php endforeach; ?>

        </div>

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
            });
        });
    })();
</script>