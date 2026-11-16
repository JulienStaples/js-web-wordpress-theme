<?php get_header(); ?>

<main>

    <section class="bg-dark">
        <h1></h1>
        <h2></h2>
        <p></p>
        <?php
        get_template_part(
            'components/button',
            null,
            [
                'text' => 'View my projects',
                'url'  => home_url('/projects/'),
                'variant' => 'light'
            ]
        );
        ?>
    </section>

</main>

<?php get_footer(); ?>