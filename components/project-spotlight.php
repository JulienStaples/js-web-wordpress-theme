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
    aria-labelledby="portfolio-heading-<?php echo esc_attr( $id ); ?>" <?php if ( ! $active ) : ?>hidden
    <?php endif; ?>
    >

    <div class="flex flex-col gap-4 p-4 sm:p-5">

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

            <div class="flex flex-col gap-3">

                <?php if ( $has_mobile_preview ) : ?>

                    <div class="flex justify-end">
                        <div class="flex gap-1 rounded-md bg-border/60 p-1" role="group" aria-label="Screenshot device">

                            <?php foreach ( [ 'desktop' => 'Desktop', 'mobile' => 'Mobile' ] as $device => $label ) : ?>

                                <button type="button" data-preview-toggle="<?php echo esc_attr( $device ); ?>"
                                    aria-pressed="<?php echo 'desktop' === $device ? 'true' : 'false'; ?>"
                                    class="cursor-pointer rounded px-2.5 py-1.5 text-xs text-dark/75 hover:bg-white hover:text-dark aria-pressed:bg-dark aria-pressed:text-light aria-pressed:hover:bg-dark aria-pressed:hover:text-light focus-visible:outline-2 focus-visible:outline-dark">
                                    <?php echo esc_html( $label ); ?>
                                </button>

                            <?php endforeach; ?>

                        </div>
                    </div>

                <?php endif; ?>

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

                                    <span class="ml-2 h-2.5 flex-1 rounded-sm bg-border"></span>

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

            <ul class="flex flex-col gap-4 py-1">
                <?php foreach ( $project['highlights'] as $title => $description ) : ?>

                    <li class="flex flex-col gap-1">
                        <p class="text-sm font-semibold"><?php echo esc_html( $title ); ?></p>
                        <p class="text-sm leading-relaxed text-dark/75"><?php echo esc_html( $description ); ?></p>
                    </li>

                <?php endforeach; ?>
            </ul>

        </div>

        <div role="tabpanel" id="<?php echo esc_attr( $id . '-content-about' ); ?>"
            aria-labelledby="<?php echo esc_attr( $id . '-tab-about' ); ?>" data-spotlight-content="about"
            tabindex="0" hidden>

            <p class="py-1 text-sm leading-relaxed text-dark/80">
                <?php echo esc_html( $project['about'] ); ?>
            </p>

        </div>

        <?php if ( ! empty( $project['url'] ) ) : ?>

            <div class="border-t border-border pt-4">

                <a href="<?php echo esc_url( $project['url'] ); ?>"
                    class="inline-flex items-center gap-3 rounded-md bg-dark px-4 py-2.5 text-sm font-medium text-light hover:bg-dark-surface hover:text-light focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-dark">

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
