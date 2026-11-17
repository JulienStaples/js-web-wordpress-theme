<?php
$title = $args['title'] ?? '';
$subtitle = $args['subtitle'] ?? '';
$description = $args['description'] ?? '';
$image_url = $args['image_url'] ?? '';
$url = $args['url'] ?? '';
$link_text = $args['link_text'] ?? 'Visit website';
?>

<article
    class="grid min-w-0 grid-rows-[auto_auto_1fr_auto] gap-3 rounded-lg border border-border p-3 md:grid-cols-[16rem_minmax(0,1fr)] md:grid-rows-[auto_1fr_auto] md:gap-x-5 md:p-4 lg:grid-cols-1 lg:grid-rows-[auto_auto_1fr_auto] lg:p-3">

    <div class="md:col-start-2 md:row-start-1 lg:col-auto lg:row-auto">
        <h3><?php echo esc_html( $title ); ?></h3>
        <p class="text-sm text-muted">
            <?php echo esc_html( $subtitle ); ?>
        </p>
    </div>

    <?php if ( $image_url ) : ?>
        <div class="overflow-hidden rounded-md md:col-start-1 md:row-span-3 md:row-start-1 lg:col-auto lg:row-auto">
            <img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( 'Screenshot of ' . $title ); ?>"
                class="aspect-video w-full object-cover object-top" loading="lazy">
        </div>
    <?php endif; ?>

    <p class="text-sm md:col-start-2 md:row-start-2 lg:col-auto lg:row-auto">
        <?php echo esc_html( $description ); ?>
    </p>

    <?php if ( $url ) : ?>
        <div class="md:col-start-2 md:row-start-3 lg:col-auto lg:row-auto">
            <?php
            get_template_part(
                'components/button',
                null,
                [
                    'text' => $link_text,
                    'url' => $url,
                    'variant' => 'dark',
                ]
            );
            ?>
        </div>
    <?php endif; ?>

</article>