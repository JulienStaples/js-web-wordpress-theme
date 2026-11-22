<?php
$project = $args['project'] ?? [];
$active = $args['active'] ?? false;
$position = $args['position'] ?? 'before';

if ( empty( $project ) ) {
    return;
}
?>

<button type="button" data-project-selector="<?php echo esc_attr( $project['id'] ); ?>"
    aria-controls="portfolio-panel-<?php echo esc_attr( $project['id'] ); ?>"
    aria-pressed="<?php echo $active ? 'true' : 'false'; ?>"
    class="group flex h-full w-full min-w-0 cursor-pointer flex-col gap-3 rounded-lg border border-border-dark bg-dark-surface p-2 text-left text-light transition-colors hover:border-muted-light focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-light aria-pressed:border-dashed aria-pressed:border-muted-light motion-reduce:transition-none sm:p-3">

    <span class="relative block aspect-video w-full overflow-hidden rounded-md bg-dark group-aria-pressed:hidden">

        <?php if ( $project['image_url'] ) : ?>

            <img src="<?php echo esc_url( $project['image_url'] ); ?>" alt="" class="h-full w-full object-cover object-top"
                loading="lazy">

        <?php else : ?>

            <span class="flex h-full items-center justify-center text-xs text-muted-light">
                Preview
            </span>

        <?php endif; ?>

    </span>

    <span
        class="hidden aspect-video w-full flex-col items-center justify-center gap-2 rounded-md border border-dashed border-muted-light text-muted-light group-aria-pressed:flex">

        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
            stroke-linecap="round" stroke-linejoin="round" class="size-6" aria-hidden="true">
            <path d="M8 3H5a2 2 0 0 0-2 2v3" />
            <path d="M16 3h3a2 2 0 0 1 2 2v3" />
            <path d="M21 16v3a2 2 0 0 1-2 2h-3" />
            <path d="M8 21H5a2 2 0 0 1-2-2v-3" />
        </svg>

        <span class="text-xs">Expanded</span>

    </span>

    <span class="flex flex-1 flex-col gap-1">

        <span class="text-sm font-semibold sm:text-base">
            <?php echo esc_html( $project['title'] ); ?>
        </span>

        <span class="text-xs text-muted-light sm:text-sm">
            <?php echo esc_html( $project['subtitle'] ); ?>
        </span>

    </span>

    <?php if ( ! empty( $project['technologies'] ) ) : ?>

        <span class="border-t border-border-dark pt-2 text-xs font-medium text-muted-light">
            <?php echo esc_html( implode( ' · ', $project['technologies'] ) ); ?>
        </span>

    <?php endif; ?>

    <span class="flex items-center justify-between gap-2 text-xs text-muted-light">

        <span class="group-aria-pressed:hidden">
            View project
        </span>

        <span class="hidden font-medium group-aria-pressed:inline">
            Currently viewing
        </span>

        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round" class="size-4 shrink-0 group-aria-pressed:hidden
                <?php echo 'before' === $position ? '-rotate-90 lg:rotate-180' : 'rotate-90 lg:rotate-0'; ?>"
            aria-hidden="true">
            <path d="m12 19-7-7 7-7" />
            <path d="M5 12h14" />
        </svg>

        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round" class="hidden size-4 shrink-0 group-aria-pressed:block"
            aria-hidden="true">
            <path d="m5 12 4 4L19 6" />
        </svg>

    </span>

</button>