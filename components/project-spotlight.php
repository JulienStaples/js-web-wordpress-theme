<?php
$project = $args['project'] ?? [];
$active = $args['active'] ?? false;

if ( empty( $project ) ) {
    return;
}

$id = $project['id'];

$tabs = [
    'preview' => 'Preview',
    'features' => 'Features',
    'build' => 'The Build',
];
?>

<article id="portfolio-panel-<?php echo esc_attr( $id ); ?>" data-project-panel="<?php echo esc_attr( $id ); ?>"
    aria-labelledby="portfolio-heading-<?php echo esc_attr( $id ); ?>" <?php if ( ! $active ) : ?>hidden
    <?php endif; ?>
    >

    <div class="flex flex-col gap-4 p-4 sm:p-5">

        <div class="flex flex-col gap-2">

            <h3 id="portfolio-heading-<?php echo esc_attr( $id ); ?>" data-project-heading tabindex="-1"
                class="text-2xl font-medium">
                <?php echo esc_html( $project['title'] ); ?>
            </h3>

            <p class="text-sm text-muted-light">
                <?php echo esc_html( $project['description'] ); ?>
            </p>

        </div>

        <div class="flex flex-col gap-3 border-y border-border-dark py-4">

            <div class="flex flex-col gap-1">

                <h4 class="text-xs font-medium uppercase tracking-wide text-muted-light">
                    My Contribution
                </h4>

                <p class="text-sm">
                    <?php echo esc_html( $project['contribution'] ); ?>
                </p>

            </div>

            <?php if ( ! empty( $project['technologies'] ) ) : ?>

                <div class="flex flex-wrap gap-2">

                    <?php foreach ( $project['technologies'] as $technology ) : ?>

                        <span class="rounded-md border border-border-dark bg-dark-surface px-2.5 py-1 text-xs">
                            <?php echo esc_html( $technology ); ?>
                        </span>

                    <?php endforeach; ?>

                </div>

            <?php endif; ?>

        </div>

        <div role="tablist" aria-label="Project details" class="grid grid-cols-3 gap-1 rounded-lg bg-dark-surface p-1">

            <?php foreach ( $tabs as $key => $label ) : ?>

                <button type="button" role="tab" id="<?php echo esc_attr( $id . '-tab-' . $key ); ?>"
                    data-spotlight-tab="<?php echo esc_attr( $key ); ?>"
                    aria-controls="<?php echo esc_attr( $id . '-content-' . $key ); ?>"
                    aria-selected="<?php echo 'preview' === $key ? 'true' : 'false'; ?>"
                    tabindex="<?php echo 'preview' === $key ? '0' : '-1'; ?>"
                    class="cursor-pointer rounded-md px-2 py-2.5 text-xs font-medium text-muted-light hover:text-light focus-visible:outline-2 focus-visible:outline-light aria-selected:bg-light aria-selected:text-dark sm:text-sm">
                    <?php echo esc_html( $label ); ?>
                </button>

            <?php endforeach; ?>

        </div>

        <div role="tabpanel" id="<?php echo esc_attr( $id . '-content-preview' ); ?>"
            aria-labelledby="<?php echo esc_attr( $id . '-tab-preview' ); ?>" data-spotlight-content="preview"
            tabindex="0">

            <div class="flex flex-col gap-3">

                <div class="flex flex-wrap items-center justify-between gap-2">

                    <span class="text-xs text-muted-light">
                        Project Preview
                    </span>

                    <div class="flex gap-1 rounded-md bg-dark-surface p-1">

                        <?php foreach ( [ 'desktop' => 'Desktop', 'mobile' => 'Mobile' ] as $device => $label ) : ?>

                            <button type="button" data-preview-toggle="<?php echo esc_attr( $device ); ?>"
                                aria-pressed="<?php echo 'desktop' === $device ? 'true' : 'false'; ?>"
                                class="cursor-pointer rounded px-2.5 py-1.5 text-xs text-muted-light aria-pressed:bg-light aria-pressed:text-dark focus-visible:outline-2 focus-visible:outline-light">
                                <?php echo esc_html( $label ); ?>
                            </button>

                        <?php endforeach; ?>

                    </div>

                </div>

                <div class="rounded-lg bg-dark-surface p-2 sm:p-3">

                    <?php
                    $previews = [
                        'desktop' => $project['image_url'],
                        'mobile' => $project['mobile_image_url'],
                    ];
                    ?>

                    <?php foreach ( $previews as $device => $image_url ) : ?>

                        <div data-preview-view="<?php echo esc_attr( $device ); ?>" <?php if ( 'mobile' === $device ) : ?>
                                hidden
                            <?php endif; ?>
                            >

                            <div class="mx-auto overflow-hidden rounded-md border border-border-dark bg-dark
                                <?php echo 'mobile' === $device ? 'max-w-44' : 'w-full'; ?>">

                                <div class="flex items-center gap-1.5 bg-light px-3 py-2">

                                    <span class="size-1.5 rounded-full bg-muted-light"></span>
                                    <span class="size-1.5 rounded-full bg-muted-light"></span>
                                    <span class="size-1.5 rounded-full bg-muted-light"></span>

                                    <span class="ml-2 h-2.5 flex-1 rounded-sm bg-border"></span>

                                </div>

                                <?php if ( $image_url ) : ?>

                                    <img src="<?php echo esc_url( $image_url ); ?>"
                                        alt="<?php echo esc_attr( ucfirst( $device ) . ' screenshot of ' . $project['title'] ); ?>"
                                        class="block w-full
                                            <?php echo 'mobile' === $device ? 'aspect-[9/16]' : 'aspect-video'; ?>
                                            object-cover object-top" loading="lazy">

                                <?php else : ?>

                                    <div class="flex items-center justify-center p-4 text-center text-xs text-muted-light
                                        <?php echo 'mobile' === $device ? 'aspect-[9/16]' : 'aspect-video'; ?>">

                                        <?php echo esc_html( ucfirst( $device ) ); ?> screenshot placeholder

                                    </div>

                                <?php endif; ?>

                            </div>

                        </div>

                    <?php endforeach; ?>

                </div>

            </div>

        </div>

        <div role="tabpanel" id="<?php echo esc_attr( $id . '-content-features' ); ?>"
            aria-labelledby="<?php echo esc_attr( $id . '-tab-features' ); ?>" data-spotlight-content="features"
            tabindex="0" hidden>

            <div class="flex flex-col gap-2">

                <?php $feature_index = 0; ?>

                <?php foreach ( $project['features'] as $title => $description ) : ?>

                    <details name="<?php echo esc_attr( $id . '-features' ); ?>"
                        class="group rounded-lg border border-border-dark bg-dark-surface" <?php if ( 0 === $feature_index++ ) : ?>open
                        <?php endif; ?>
                        >

                        <summary
                            class="flex cursor-pointer list-none items-center justify-between gap-3 p-3 text-sm font-medium focus-visible:outline-2 focus-visible:outline-light">

                            <?php echo esc_html( $title ); ?>

                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2"
                                class="size-4 shrink-0 transition-transform group-open:rotate-180 motion-reduce:transition-none"
                                aria-hidden="true">
                                <path d="m6 9 6 6 6-6" />
                            </svg>

                        </summary>

                        <div class="flex flex-col gap-3 border-t border-border-dark p-3">

                            <p class="text-sm text-muted-light">
                                <?php echo esc_html( $description ); ?>
                            </p>

                            <div
                                class="flex min-h-32 items-center justify-center rounded-md border border-dashed border-border-dark bg-dark p-4 text-center text-xs text-muted-light">

                                Feature demonstration placeholder

                            </div>

                        </div>

                    </details>

                <?php endforeach; ?>

            </div>

        </div>

        <div role="tabpanel" id="<?php echo esc_attr( $id . '-content-build' ); ?>"
            aria-labelledby="<?php echo esc_attr( $id . '-tab-build' ); ?>" data-spotlight-content="build" tabindex="0"
            hidden>

            <div
                class="divide-y divide-border-dark overflow-hidden rounded-lg border border-border-dark bg-dark-surface">

                <?php foreach ( $project['build'] as $title => $description ) : ?>

                    <div class="flex flex-col gap-2 p-4">

                        <h4 class="text-sm font-semibold">
                            <?php echo esc_html( $title ); ?>
                        </h4>

                        <p class="text-sm text-muted-light">
                            <?php echo esc_html( $description ); ?>
                        </p>

                    </div>

                <?php endforeach; ?>

            </div>

        </div>

        <?php if ( ! empty( $project['url'] ) ) : ?>

            <div class="border-t border-border-dark pt-4">

                <a href="<?php echo esc_url( $project['url'] ); ?>"
                    class="inline-flex items-center gap-3 rounded-md bg-light px-4 py-2.5 text-sm font-medium text-dark hover:bg-muted-light focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-light">

                    <?php echo esc_html( $project['link_text'] ); ?>

                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" class="size-4" aria-hidden="true">
                        <path d="M7 17 17 7M7 7h10v10" />
                    </svg>

                </a>

            </div>

        <?php endif; ?>

    </div>

</article>