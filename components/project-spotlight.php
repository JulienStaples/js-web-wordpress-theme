<?php
$project = $args['project'] ?? [];
$active = $args['active'] ?? false;

if ( empty( $project ) ) {
    return;
}

$id = $project['id'];

// Only offer the mobile view when an actual mobile capture is available.
$has_mobile_preview = ! empty( $project['mobile_image_url'] );
$previews = [ 'desktop' => $project['image_url'] ?? '' ];
if ( $has_mobile_preview ) {
    $previews['mobile'] = $project['mobile_image_url'];
}

$tabs = [
    'preview' => 'Preview',
    'highlights' => 'Highlights',
    'about' => 'About',
];
?>

<article id="portfolio-panel-<?php echo esc_attr( $id ); ?>" data-project-panel="<?php echo esc_attr( $id ); ?>"
    aria-labelledby="portfolio-heading-<?php echo esc_attr( $id ); ?>" class="h-full" <?php if ( ! $active ) : ?>hidden
    <?php endif; ?>
    >

    <div class="flex h-full flex-col gap-4 p-4 sm:p-5">

        <div class="flex flex-col gap-2">

            <h3 id="portfolio-heading-<?php echo esc_attr( $id ); ?>" data-project-heading tabindex="-1"
                class="text-2xl font-medium">
                <?php echo esc_html( $project['title'] ); ?>
            </h3>

            <p class="text-sm text-dark/75">
                <?php echo esc_html( $project['description'] ); ?>
            </p>

        </div>

        <?php if ( ! empty( $project['technologies'] ) ) : ?>

            <ul class="flex flex-wrap gap-2 border-y border-border py-4" aria-label="Technologies used">

                <?php foreach ( $project['technologies'] as $technology ) : ?>

                    <li class="rounded-md border border-border bg-border/60 px-2.5 py-1 text-xs">
                        <?php echo esc_html( $technology ); ?>
                    </li>

                <?php endforeach; ?>

            </ul>

        <?php endif; ?>

        <div role="tablist" aria-label="Project details" class="grid grid-cols-3 gap-1 rounded-lg bg-border/60 p-1">

            <?php foreach ( $tabs as $key => $label ) : ?>

                <button type="button" role="tab" id="<?php echo esc_attr( $id . '-tab-' . $key ); ?>"
                    data-spotlight-tab="<?php echo esc_attr( $key ); ?>"
                    aria-controls="<?php echo esc_attr( $id . '-content-' . $key ); ?>"
                    aria-selected="<?php echo 'preview' === $key ? 'true' : 'false'; ?>"
                    tabindex="<?php echo 'preview' === $key ? '0' : '-1'; ?>"
                    class="cursor-pointer rounded-md px-2 py-2.5 text-xs font-medium text-dark/75 hover:bg-white hover:text-dark focus-visible:outline-2 focus-visible:outline-dark aria-selected:bg-dark aria-selected:text-light aria-selected:hover:bg-dark aria-selected:hover:text-light sm:text-sm">
                    <?php echo esc_html( $label ); ?>
                </button>

            <?php endforeach; ?>

        </div>

        <div role="tabpanel" id="<?php echo esc_attr( $id . '-content-preview' ); ?>"
            aria-labelledby="<?php echo esc_attr( $id . '-tab-preview' ); ?>" data-spotlight-content="preview"
            tabindex="0">

            <div>

                <div class="rounded-lg bg-border/40 p-2 sm:p-3">

                    <?php foreach ( $previews as $device => $image_url ) : ?>

                        <div data-preview-view="<?php echo esc_attr( $device ); ?>" <?php if ( 'mobile' === $device ) : ?>
                                hidden
                            <?php endif; ?>
                            >

                            <div class="mx-auto overflow-hidden rounded-md border border-border bg-white
                                <?php echo 'mobile' === $device ? 'max-w-44' : 'w-full'; ?>">

                                <div class="flex items-center gap-1.5 bg-light px-3 py-2">

                                    <span class="size-1.5 rounded-full bg-muted-light"></span>
                                    <span class="size-1.5 rounded-full bg-muted-light"></span>
                                    <span class="size-1.5 rounded-full bg-muted-light"></span>

                                    <?php if ( ! empty( $project['site_url'] ) ) : ?>
                                        <span class="ml-2 min-w-0 flex-1 truncate rounded-sm bg-border px-2 py-0.5 text-center text-xs text-dark/80">
                                            <?php echo esc_html( wp_parse_url( $project['site_url'], PHP_URL_HOST ) ); ?>
                                        </span>
                                    <?php else : ?>
                                        <span class="ml-2 h-2.5 flex-1 rounded-sm bg-border"></span>
                                    <?php endif; ?>

                                </div>

                                <?php if ( $image_url ) : ?>

                                    <img src="<?php echo esc_url( $image_url ); ?>"
                                        alt="<?php echo esc_attr( ucfirst( $device ) . ' screenshot of ' . $project['title'] ); ?>"
                                        class="block w-full
                                            <?php echo 'mobile' === $device ? 'aspect-[9/16]' : 'aspect-video'; ?>
                                            object-cover object-top" loading="lazy">

                                <?php else : ?>

                                    <div class="flex items-center justify-center p-4 text-center text-xs text-dark/70
                                        <?php echo 'mobile' === $device ? 'aspect-[9/16]' : 'aspect-video'; ?>">

                                        Screenshot coming soon

                                    </div>

                                <?php endif; ?>

                            </div>

                        </div>

                    <?php endforeach; ?>



                </div>

            </div>

        </div>

        <div role="tabpanel" id="<?php echo esc_attr( $id . '-content-highlights' ); ?>"
            aria-labelledby="<?php echo esc_attr( $id . '-tab-highlights' ); ?>" data-spotlight-content="highlights"
            tabindex="0" hidden>

            <?php // Compact highlight cards: the entire summary remains visible without interaction. ?>
            <ul class="flex flex-col gap-2 py-1">
                <?php foreach ( ( $project['highlights'] ?? [] ) as $title => $highlight ) : ?>
                    <?php
                    // Backward compatible with the existing 'Title' => 'Description' data.
                    // Later, individual entries can provide optional deeper evidence:
                    // 'Title' => [ 'summary' => '...', 'details' => [ '...', '...' ] ].
                    $summary = is_array( $highlight )
                        ? ( $highlight['summary'] ?? '' )
                        : $highlight;
                    $detail_lines = is_array( $highlight ) ? ( $highlight['details'] ?? [] ) : [];
                    $detail_lines = array_values( array_filter( array_map(
                        'strval', (array) $detail_lines
                    ), 'strlen' ) );
                    $has_details = ! empty( $detail_lines );
                    ?>

                    <li>
                        <?php if ( $has_details ) : ?>
                            <details name="portfolio-highlights-<?php echo esc_attr( $id ); ?>" class="group overflow-hidden rounded-md border border-border bg-white open:border-muted">
                                <summary class="flex min-h-16 cursor-pointer list-none items-start justify-between gap-3 px-3 py-3 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-dark [&::-webkit-details-marker]:hidden">
                                    <span class="flex min-w-0 flex-col gap-1">
                                        <span class="text-sm font-semibold text-dark"><?php echo esc_html( $title ); ?></span>
                                        <span class="text-sm leading-5 text-dark/75"><?php echo esc_html( $summary ); ?></span>
                                    </span>
                                    <svg class="mt-1 size-4 shrink-0 text-dark/70 transition-transform group-open:rotate-180 motion-reduce:transition-none"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                                        stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                        <path d="m6 9 6 6 6-6" />
                                    </svg>
                                </summary>
                                <div class="border-t border-border px-3 py-3">
                                    <ul class="list-disc space-y-2 pl-4 text-sm leading-6 text-dark/80">
                                        <?php foreach ( $detail_lines as $line ) : ?>
                                            <li><?php echo esc_html( $line ); ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </details>
                        <?php else : ?>
                            <div class="flex min-h-16 flex-col justify-center gap-1 rounded-md border border-border bg-white px-3 py-3">
                                <p class="text-sm font-semibold text-dark"><?php echo esc_html( $title ); ?></p>
                                <p class="text-sm leading-5 text-dark/75"><?php echo esc_html( $summary ); ?></p>
                            </div>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>

        </div>

        <div role="tabpanel" id="<?php echo esc_attr( $id . '-content-about' ); ?>"
            aria-labelledby="<?php echo esc_attr( $id . '-tab-about' ); ?>" data-spotlight-content="about"
            tabindex="0" hidden>

            <p class="py-2 text-sm leading-6 text-dark">
                <?php echo esc_html( $project['about'] ); ?>
            </p>

        </div>

        <?php if ( ! empty( $project['url'] ) || $has_mobile_preview ) : ?>

            <div class="mt-auto flex flex-wrap items-center justify-between gap-3 border-t border-border pt-4">

                <?php if ( ! empty( $project['url'] ) ) : ?>

                    <?php
                    get_template_part(
                        'components/button',
                        null,
                        [
                            'text'    => $project['link_text'],
                            'url'     => $project['url'],
                            'variant' => 'dark',
                        ]
                    );
                    ?>

                <?php endif; ?>

                <?php if ( $has_mobile_preview ) : ?>

                    <div data-preview-controls class="min-w-0">
                        <div class="inline-flex max-w-full flex-wrap gap-1 rounded-md bg-border/60 p-1" role="group" aria-label="Screenshot device">

                            <?php foreach ( [ 'desktop' => 'Desktop', 'mobile' => 'Mobile' ] as $device => $label ) : ?>

                                <button type="button" data-preview-toggle="<?php echo esc_attr( $device ); ?>"
                                    aria-pressed="<?php echo 'desktop' === $device ? 'true' : 'false'; ?>"
                                    class="min-h-11 cursor-pointer rounded px-2.5 py-1.5 text-xs text-dark/75 hover:bg-white hover:text-dark aria-pressed:bg-dark aria-pressed:text-light aria-pressed:hover:bg-dark aria-pressed:hover:text-light focus-visible:outline-2 focus-visible:outline-dark">
                                    <?php echo esc_html( $label ); ?>
                                </button>

                            <?php endforeach; ?>

                        </div>
                    </div>

                <?php endif; ?>

            </div>

        <?php endif; ?>

    </div>

</article>
