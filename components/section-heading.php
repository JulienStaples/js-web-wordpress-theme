<?php
$title = $args['title'] ?? '';
$id = $args['id'] ?? '';

if ( '' === $title || '' === $id ) {
    return;
}
?>
<div class="homepage-section-heading">
    <h2 id="<?php echo esc_attr( $id ); ?>">
        <span>
            <?php echo esc_html( $title ); ?>
        </span>
    </h2>
</div>
