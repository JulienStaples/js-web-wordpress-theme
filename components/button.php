<?php
$args = $args ?? [];

$text = $args['text'] ?? 'EMPTY';
$url  = $args['url'] ?? '#';
$variant = $args['variant'] ?? 'dark';

$colors = $variant === 'light'
    ? 'bg-light text-dark border-light hover:bg-dark hover:text-light'
    : 'bg-dark text-light border-dark hover:bg-light hover:text-dark';
?>

<a
    href="<?php echo esc_url($url); ?>"
    class="inline-flex justify-center items-center px-6 py-3 border-2 rounded min-h-12 transition-colors <?php echo esc_attr($colors); ?>">
    <?php echo esc_html($text); ?>
</a>