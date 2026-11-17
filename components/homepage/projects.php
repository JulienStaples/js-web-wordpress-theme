<section id="projects" aria-labelledby="projects-heading" class="section gap-6">
    <h2 id="projects-heading">
        Client &amp; Technical Work
    </h2>

    <div class="grid gap-4 lg:grid-cols-3">
        <?php
        get_template_part(
            'components/project-card',
            null,
            [
                'title' => 'GGB Enterprises',
                'subtitle' => 'Client WordPress Website',
                'description' => 'I built and launched a WordPress site for a small contracting business. The project covered responsive implementation, content, and the work needed to get the site live.',
                'image_url' => get_theme_file_uri( 'assets/imgs/ggb.webp' ),
                'link_text' => 'Visit the GGB Enterprises website',
                'url' => 'https://ggbenterprises.org/',
            ]
        );
        ?>

        <?php
        get_template_part(
            'components/project-card',
            null,
            [
                'title' => 'Sip & Drift',
                'subtitle' => 'Marketing Website',
                'description' => 'I built a marketing site for a mobile bartending business. The site makes it easy to understand the service, compare packages, and book.',
                'link_text' => 'Visit the Sip & Drift website',
                'url' => 'https://sipdrift.shop/',
                'image_url' => get_theme_file_uri( 'assets/imgs/sipndrift.webp' ),
            ]
        );
        ?>

        <?php
        get_template_part(
            'components/project-card',
            null,
            [
                'title' => 'Language Learning Demo',
                'subtitle' => 'Front-End Web Application',
                'description' => 'I built an interactive reading app with Next.js, React, and TypeScript. Users can work through a text word by word, track vocabulary, and save difficulty ratings while they read.',
                'link_text' => 'View the code on GitHub',
                'url' => 'https://github.com/JulienStaples/lang-demo',
                'image_url' => get_theme_file_uri( 'assets/imgs/lang-app.webp' ),
            ]
        );
        ?>
    </div>
</section>