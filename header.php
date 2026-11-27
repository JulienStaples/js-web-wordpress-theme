<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
    // Shared interaction motion; independent of the homepage GSAP demos.
    $interaction_style = '/css/components/interactions.css';
    $interaction_script = '/assets/js/interactions.js';
    if ( is_readable( get_theme_file_path( $interaction_style ) ) ) {
        wp_enqueue_style( 'js-web-interactions', get_theme_file_uri( $interaction_style ), [ 'js-web-tailwind' ], filemtime( get_theme_file_path( $interaction_style ) ) );
    }
    if ( is_readable( get_theme_file_path( $interaction_script ) ) ) {
        wp_enqueue_script( 'js-web-interactions', get_theme_file_uri( $interaction_script ), [], filemtime( get_theme_file_path( $interaction_script ) ), true );
    }
    wp_head();
    ?>
</head>

<body id="top" tabindex="-1" <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <a class="skip-link" href="#main-content">Skip to main content</a>

    <header id="site-header" class="sticky top-0 z-50 border-b border-border-dark bg-dark text-light">
        <div class="section flex-row flex-wrap items-center justify-between gap-2 py-2 min-h-12 md:min-h-16">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"
                class="flex min-w-0 max-w-full items-center gap-1 text-sm font-medium sm:gap-2">
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
                const tooTall = header.offsetHeight > window.innerHeight / 3;
                header.classList.toggle('header-in-flow', tooTall);
                document.documentElement.style.setProperty('--site-header-height', `${tooTall ? 0 : header.offsetHeight}px`);
            };

            updateHeaderHeight();
            new ResizeObserver(updateHeaderHeight).observe(header);
            window.addEventListener('resize', updateHeaderHeight);

            document.addEventListener('focusin', event => {
                const target = event.target;
                if (header.contains(target) || target.classList.contains('skip-link') || target === document.body) return;

                requestAnimationFrame(() => {
                    if (document.activeElement !== target || !target.matches(':focus-visible') || header.classList.contains('header-in-flow')) return;

                    const visibleTop = header.getBoundingClientRect().bottom + 8;
                    const bounds = target.getBoundingClientRect();
                    if (bounds.top < visibleTop && bounds.bottom > 0) {
                        window.scrollBy({ top: bounds.top - visibleTop, behavior: 'instant' });
                    }
                });
            });
        }
    </script>
