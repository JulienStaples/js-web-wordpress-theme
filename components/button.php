<?php
/**
 * Shared editorial link button.
 *
 * Arguments:
 * - text:    Visible label.
 * - url:     Destination.
 * - variant: 'light' (light fill), 'dark' (dark fill), or 'outline'.
 * - document_variant: Optional PDF appearance override (defaults to 'outline').
 *
 * Off-site links and PDFs open in a new tab. Internal links do not.
 * PDF links use the secondary outline appearance by default.
 */
$args = $args ?? [];

$text    = $args['text'] ?? '';
$url     = $args['url'] ?? '#';
$variant = $args['variant'] ?? 'dark';

$is_document = (bool) preg_match( '/\.pdf(?:[?#]|$)/i', $url );

$destination_host = wp_parse_url( $url, PHP_URL_HOST );
$site_host        = wp_parse_url( home_url( '/' ), PHP_URL_HOST );

$normalize_host = static function ( $host ) {
    return preg_replace( '/^www\./i', '', strtolower( (string) $host ) );
};

$is_off_site = ! empty( $destination_host )
    && $normalize_host( $destination_host ) !== $normalize_host( $site_host );

$opens_new_tab = $is_document || $is_off_site;
$appearance    = $is_document ? ( $args['document_variant'] ?? 'outline' ) : $variant;

$base_classes = 'inline-flex min-h-11 items-center justify-center gap-2.5 rounded-sm border px-4 py-2.5 text-sm font-semibold no-underline transition-colors hover:no-underline focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-current motion-reduce:transition-none';

$appearance_classes = [
    'light'   => 'border-light bg-light text-dark hover:border-light hover:bg-dark hover:text-light',
    'dark'    => 'border-dark bg-dark text-light hover:border-dark hover:bg-light hover:text-dark',
    'outline' => 'border-muted-light bg-transparent text-light hover:border-light hover:bg-light hover:text-dark',
];

$classes = $base_classes . ' ' . ( $appearance_classes[ $appearance ] ?? $appearance_classes['dark'] );
?>

<a href="<?php echo esc_url( $url ); ?>"
    class="<?php echo esc_attr( $classes ); ?>"
    <?php if ( $opens_new_tab ) : ?>target="_blank" rel="noopener noreferrer"<?php endif; ?>>
    <span><?php echo esc_html( $text ); ?></span>

    <?php if ( $is_document ) : ?>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"
            class="size-4 shrink-0" aria-hidden="true">
            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8Z" />
            <path d="M14 2v6h6M8 13h8M8 17h8" />
        </svg>
    <?php elseif ( $is_off_site ) : ?>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"
            class="size-4 shrink-0" aria-hidden="true">
            <path d="M15 3h6v6M10 14 21 3" />
            <path d="M21 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h6" />
        </svg>
    <?php endif; ?>

    <?php if ( $opens_new_tab ) : ?>
        <span class="sr-only">(opens in a new tab)</span>
    <?php endif; ?>
</a>
