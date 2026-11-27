<?php get_header(); ?>

<main id="main-content">

    <section>
        <div class="section gap-8 md:flex-row md:items-center lg:gap-14 lg:py-16">

            <div class="flex min-w-0 flex-1 flex-col items-start gap-8 lg:gap-10">
                <div class="inline-flex items-center gap-2 rounded-full bg-dark-surface px-3 py-2">
                    <?php
                    echo wp_get_attachment_image(
                        14,
                        'thumbnail',
                        false,
                        [
                            'class' => 'size-7 shrink-0 rounded-full object-cover',
                            'alt' => '',
                        ]
                    );
                    ?>

                    <p class="text-xs text-muted-light">
                        Hey, nice to meet you.
                    </p>
                </div>


                <div class="flex flex-col gap-3">
                    <h1 class="tracking-tight">
                        I build websites. And keep them working.
                    </h1>

                    <p class="max-w-[64ch] text-base leading-6 text-muted-light">
                        My work touches every part of the website, from planning and content to maintenance and analytics.
                    </p>
                </div>

                <?php
                get_template_part(
                    'components/button',
                    null,
                    [
                        'text' => 'View resume',
                        'url' => get_theme_file_uri( 'assets/imgs/Julien-Staples-Resume.pdf' ),
                        'document_variant' => 'light',
                    ]
                );
                ?>
            </div>

            <div
                class="hidden shrink-0 overflow-hidden rounded-lg bg-[#454545] md:block md:h-[305px] md:w-[245px] lg:h-[455px] lg:w-[390px]">
                <?php
                echo wp_get_attachment_image(
                    14,
                    'full',
                    false,
                    [
                        'class' => 'h-full w-full object-cover',
                        'loading' => 'eager',
                        'fetchpriority' => 'high',
                    ]
                );
                ?>
            </div>
        </div>
    </section>

    <?php get_template_part( 'components/homepage/marquee' ); ?>

    <?php get_template_part( 'components/homepage/ne6' ); ?>

    <?php get_template_part( 'components/homepage/projects' ); ?>

    <?php get_template_part( 'components/homepage/tools' ); ?>

    <?php get_template_part( 'components/homepage/experience' ); ?>
</main>

<?php get_footer(); ?>