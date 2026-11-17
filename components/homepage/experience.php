<section id="experience" aria-labelledby="experience-heading" class="section gap-6">
    <h2 id="experience-heading">Experience</h2>
    <div class="ml-1 max-w-3xl">
        <article
            class="relative pb-8 pl-7 before:absolute before:left-0 before:top-3 before:bottom-0 before:border-l before:border-muted/50">
            <span class="absolute left-0 top-2 size-2 -translate-x-1/2 rounded-full bg-dark ring-2 ring-light"
                aria-hidden="true"></span>

            <h3 class="text-base md:text-xl">
                NE6 — WebOps Specialist
            </h3>
            <p class="mt-1 text-sm text-muted">2026–Present</p>
            <p class="mt-2 text-sm text-dark/75">
                Production WordPress operations and web development.
            </p>
        </article>

        <article class="relative border-l border-muted/50 pb-8 pl-7">
            <span class="absolute left-0 top-2 size-2 -translate-x-1/2 rounded-full bg-dark ring-2 ring-light"
                aria-hidden="true"></span>

            <h3 class="text-base md:text-xl">
                MRB Info Technologies — Intern
            </h3>
            <p class="mt-1 text-sm text-muted">2025–2026</p>
            <p class="mt-2 text-sm text-dark/75">
                Worked with a development team across web and software projects.
            </p>
        </article>

        <article class="relative border-l border-muted/50 pb-8 pl-7">
            <span class="absolute left-0 top-2 size-2 -translate-x-1/2 rounded-full bg-dark ring-2 ring-light"
                aria-hidden="true"></span>

            <h3 class="text-base md:text-xl">
                Independent Web Development &amp; Projects
            </h3>
            <p class="mt-1 text-sm text-muted">2020–2025</p>
            <p class="mt-2 text-sm text-dark/75">
                Independent web projects beginning in 2020, with paid
                small-business client work beginning in 2023.
            </p>
        </article>

        <div
            class="relative flex items-center pl-7 before:absolute before:top-0 before:bottom-1/2 before:left-0 before:border-l before:border-muted/50">

            <span
                class="absolute left-0 top-1/2 z-10 grid size-8 -translate-x-1/2 -translate-y-1/2 place-items-center bg-light"
                aria-hidden="true">
                <svg class="size-6 text-dark" viewBox="0 0 24 24" fill="currentColor">
                    <path
                        d="M12 0 C13.2 8.5 15.5 10.8 24 12 C15.5 13.2 13.2 15.5 12 24 C10.8 15.5 8.5 13.2 0 12 C8.5 10.8 10.8 8.5 12 0 Z" />
                </svg>
            </span>

            <?php
            get_template_part(
                'components/button',
                null,
                [
                    'text' => 'View full résumé',
                    'url' => get_theme_file_uri( 'assets/imgs/Julien-Staples-Resume.pdf' ),
                    'variant' => 'dark',
                ]
            );
            ?>
        </div>
</section>