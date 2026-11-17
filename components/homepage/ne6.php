<section id="ne6" aria-labelledby="ne6-heading" class="section gap-6">

    <div class="flex flex-col gap-3">
        <h2 id="ne6-heading">Production WebOps at NE6</h2>

        <p class="max-w-2xl">
            NE6’s website is part of my day-to-day work. I build new pages,
            keep existing ones working, and step into the front end when
            Divi can’t do what the page needs.
        </p>
    </div>

    <div class="flex flex-col gap-6 lg:flex-row lg:items-start lg:gap-9">
        <div class="w-full shrink-0 overflow-hidden rounded-lg lg:w-1/2">
            <img src="<?php echo esc_url( get_theme_file_uri( 'assets/imgs/ne6.png' ) ); ?>"
                alt="Screenshot of the NE6 website" class="h-auto w-full" loading="lazy">
        </div>


        <div class="flex min-w-0 flex-1 flex-col gap-5">
            <p>
                I also handle the less visible work that keeps a production
                site healthy: updates, backups, forms, troubleshooting,
                testing, and fixes.
            </p>

            <p>
                Some projects start with a goal rather than a finished spec.
                For NE6’s Accessibility Program, I turned an initial idea
                into a seven-page section with its own navigation, content,
                imagery, and blog hub.
            </p>

            <?php
            get_template_part(
                'components/button',
                null,
                [
                    'text' => 'Visit the NE6 website',
                    'url' => 'https://llc.ne6.us/',
                    'variant' => 'dark',
                ]
            );
            ?>
        </div>
    </div>
</section>