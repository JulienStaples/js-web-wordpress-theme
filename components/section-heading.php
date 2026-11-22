<?php
$number = $args['number'] ?? '';
$title = $args['title'] ?? '';
$id = $args['id'] ?? '';

if ( '' === $number || '' === $title || '' === $id ) {
    return;
}
?>
<div class="homepage-section-heading">
    <h2 id="<?php echo esc_attr( $id ); ?>">
        <span class="homepage-section-number" aria-hidden="true">
            <?php echo esc_html( $number ); ?>
        </span>
        <span class="homepage-section-divider" aria-hidden="true"></span>
        <span>
            <?php echo esc_html( $title ); ?>
        </span>
    </h2>
</div>