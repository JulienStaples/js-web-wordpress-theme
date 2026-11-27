<?php
$experience_items = [
    [
        'title' => 'NE6',
        'role' => 'WebOps Specialist',
        'dates' => '2026 – Present',
        'description' => 'Website development and ongoing management of the company\'s production WordPress site.',
    ],
    [
        'title' => 'MRB Info Technologies',
        'role' => 'Software Development Intern',
        'dates' => '2025 – 2026',
        'description' => 'Worked alongside a development team on web and software projects in a collaborative development environment.',
    ],
    [
        'title' => 'Independent Web Development',
        'role' => 'Freelance & Personal Projects',
        'dates' => '2020 – 2025',
        'description' => 'Started building independent web projects in 2020 and began working with small business clients in 2023.',
    ],
];
?>

<section id="experience" aria-labelledby="experience-heading" class="section">

    <?php
    get_template_part(
        'components/section-heading',
        null,
        [
            'number' => '04',
            'title' => 'Experience',
            'id' => 'experience-heading',
        ]
    );
    ?>

    <div class="ml-1 max-w-3xl">
        <?php foreach ( $experience_items as $index => $item ) : ?>

            <article class="relative pb-8 pl-7 <?php echo 0 === $index
                ? 'before:absolute before:left-0 before:top-3 before:bottom-0 before:border-l before:border-border-dark'
                : 'border-l border-border-dark'; ?>">
                <span class="absolute left-0 top-2 size-2 -translate-x-1/2 rounded-full bg-light ring-4 ring-dark"
                    aria-hidden="true"></span>

                <h3 class="text-base md:text-xl">
                    <?php echo esc_html( $item['title'] ); ?>
                </h3>
                <p class="mt-1 text-sm text-muted-light/80">
                    <?php echo esc_html( $item['role'] . ' | ' . $item['dates'] ); ?>
                </p>
                <p class="mt-2 text-sm text-muted-light">
                    <?php echo esc_html( $item['description'] ); ?>
                </p>
            </article>

        <?php endforeach; ?>

        <div
            class="relative flex items-center pl-7 before:absolute before:top-0 before:bottom-1/2 before:left-0 before:border-l before:border-border-dark">
            <span
                class="absolute left-0 top-1/2 z-10 grid size-8 -translate-x-1/2 -translate-y-1/2 place-items-center bg-dark"
                aria-hidden="true">
                <svg class="size-6 text-light" viewBox="0 0 24 24" fill="currentColor">
                    <path
                        d="M12 0 C13.2 8.5 15.5 10.8 24 12 C15.5 13.2 13.2 15.5 12 24 C10.8 15.5 8.5 13.2 0 12 C8.5 10.8 10.8 8.5 12 0 Z" />
                </svg>
            </span>

            <?php
            get_template_part(
                'components/button',
                null,
                [
                    'text' => 'View full resume',
                    'url' => get_theme_file_uri( 'assets/imgs/Julien-Staples-Resume.pdf' ),
                    'variant' => 'light',
                ]
            );
            ?>
        </div>
    </div>

</section>