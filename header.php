<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body id="top" <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <header id="site-header" class="sticky top-0 z-50 bg-dark text-light">
        <div class="section flex-row flex-wrap items-center justify-between gap-2 py-2 min-h-12 md:min-h-16">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"
                class="flex min-w-0 max-w-full items-center gap-2 text-sm font-medium">
                <img src="<?php echo esc_url( get_theme_file_uri( 'assets/imgs/js-logo-initials-white.svg' ) ); ?>"
                    alt="" class="size-6 shrink-0" width="24" height="24">
                <span class="min-w-0 wrap-anywhere">Julien Staples</span>
            </a>

            <nav aria-label="Primary navigation" class="flex min-w-0 max-w-full flex-wrap items-center gap-2">
                <?php
                get_template_part( 'components/button', null, [
                    'text' => 'Contact',
                    'url' => home_url( '/#footer' ),
                    'variant' => 'outline',
                ] );

                get_template_part( 'components/button', null, [
                    'text' => 'Resume',
                    'url' => get_theme_file_uri( 'assets/imgs/Julien-Staples-Resume.pdf' ),
                    'document_variant' => 'light',
                ] );
                ?>
            </nav>
        </div>
    </header>

    <script>
        {
            const header = document.getElementById('site-header');
            const updateHeaderHeight = () => {
                document.documentElement.style.setProperty('--site-header-height', `${header.offsetHeight}px`);
            };

            updateHeaderHeight();
            new ResizeObserver(updateHeaderHeight).observe(header);
        }
    </script>
