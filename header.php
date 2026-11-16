<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body id="top" <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <header class="sticky top-0 z-50 bg-dark text-light">
        <div class="section flex-row items-center justify-between gap-6 py-0 min-h-12 md:min-h-16">

            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"
                class="flex shrink-0 items-center gap-2 text-sm font-medium">
                <img src="<?php echo esc_url( get_theme_file_uri( 'assets/imgs/js-logo-initials-white.svg' ) ); ?>"
                    alt="" class="size-6" width="24" height="24">
                <span>Julien Staples</span>
            </a>

            <nav aria-label="Primary navigation" class="hidden md:block">
                <ul class="flex gap-6 text-sm">
                    <li>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" <?php if ( is_front_page() ) : ?>aria-current="page" <?php endif; ?>>
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url( home_url( '/projects/' ) ); ?>" <?php if ( is_page( 'projects' ) ) : ?>aria-current="page" <?php endif; ?>>
                            Projects
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url( home_url( '/about/' ) ); ?>" <?php if ( is_page( 'about' ) ) : ?>aria-current="page" <?php endif; ?>>
                            About
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url( home_url( '/#footer' ) ); ?>">
                            Contact
                        </a>
                    </li>
                </ul>
            </nav>


            <div class="hidden md:flex">
                <?php
                get_template_part( 'components/button', null, [
                    'text' => 'View résumé',
                    'url' => get_theme_file_uri( 'assets/imgs/Julien-Staples-Resume.pdf' ),
                    'variant' => 'light',
                ] );
                ?>
            </div>

            <details class="group relative md:hidden">
                <summary
                    class="flex cursor-pointer list-none items-center rounded p-2 focus-visible:outline-2 focus-visible:outline-offset-4">
                    <span class="sr-only">Menu</span>

                    <svg class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" aria-hidden="true">
                        <!-- Hamburger -->
                        <g
                            class="origin-center transition-all duration-200 group-open:rotate-90 group-open:opacity-0 motion-reduce:transition-none">
                            <path d="M4 6h16 M4 12h16 M4 18h16" />
                        </g>

                        <!-- Close -->
                        <g
                            class="origin-center -rotate-90 opacity-0 transition-all duration-200 group-open:rotate-0 group-open:opacity-100 motion-reduce:transition-none">
                            <path d="M6 6l12 12 M18 6L6 18" />
                        </g>
                    </svg>
                </summary>

                <nav aria-label="Mobile navigation"
                    class="absolute top-full right-0 z-50 mt-2 w-48 rounded border border-border-dark bg-dark p-4">
                    <ul class="flex flex-col gap-4 text-sm">
                        <li>
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" <?php if ( is_front_page() ) : ?>aria-current="page" <?php endif; ?>>
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo esc_url( home_url( '/projects/' ) ); ?>" <?php if ( is_page( 'projects' ) ) : ?>aria-current="page" <?php endif; ?>>
                                Projects
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo esc_url( home_url( '/about/' ) ); ?>" <?php if ( is_page( 'about' ) ) : ?>aria-current="page" <?php endif; ?>>
                                About
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo esc_url( home_url( '/#footer' ) ); ?>">
                                Contact
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo esc_url( get_theme_file_uri( 'assets/imgs/Julien-Staples-Resume.pdf' ) ); ?>"
                                target="_blank" rel="noopener noreferrer" class="font-medium underline">
                                View résumé
                                <span class="sr-only">Opens in a new tab</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </details>
        </div>
    </header>