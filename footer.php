<footer id="footer" class="bg-dark text-light">
    <div class="section gap-7">

        <div class="flex flex-col gap-7 md:flex-row md:gap-36">
            <div class="flex flex-col gap-2 md:gap-3">
                <h2 id="contact-heading">
                    Contact
                </h2>

                <p class="text-muted-light">
                    If this looks like the kind of work your team needs, email me.
                </p>
            </div>

            <div class="flex flex-col items-start gap-2 md:gap-3">
                <a href="mailto:julienstaples.web@gmail.com" class="font-medium underline underline-offset-2">
                    julienstaples.web@gmail.com
                </a>

                <button type="button" id="copy-email"
                    class="inline-flex cursor-pointer items-center gap-2 rounded-md border border-muted px-3 py-2 text-sm text-light hover:border-light">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"
                        aria-hidden="true">
                        <rect x="8" y="8" width="12" height="12" rx="2" />
                        <path d="M16 8V6a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h2" />
                    </svg>

                    <span id="copy-email-label" aria-live="polite">Copy email</span>
                </button>
            </div>
        </div>

        <hr class="h-px w-full border-0 bg-border-dark">

        <div class="flex flex-col gap-5 md:flex-row md:items-center md:justify-between">
            <nav aria-label="Footer navigation">
                <ul class="flex flex-wrap gap-5 text-sm text-muted-light">
                    <li>
                        <a href="<?php echo esc_url( get_theme_file_uri( 'assets/imgs/Julien-Staples-Resume.pdf' ) ); ?>"
                            target="_blank" rel="noopener noreferrer">
                            Resume
                            <span class="sr-only">opens in a new tab</span>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.linkedin.com/in/julien-staples-a3551b384/" target="_blank"
                            rel="noopener noreferrer">
                            LinkedIn
                            <span class="sr-only">opens in a new tab</span>

                        </a>
                    </li>
                    <li>
                        <a href="https://github.com/JulienStaples" target="_blank" rel="noopener noreferrer">
                            GitHub
                            <span class="sr-only">opens in a new tab</span>
                        </a>
                    </li>
                </ul>
            </nav>

            <p class="text-xs text-muted-light">
                &copy; <?php echo esc_html( date( 'Y' ) ); ?> Julien Staples
            </p>
        </div>
    </div>
</footer>

<?php get_template_part( 'components/scroll-to-top' ); ?>

<script>
    const copyEmailButton = document.querySelector('#copy-email');
    const copyEmailLabel = document.querySelector('#copy-email-label');

    copyEmailButton?.addEventListener('click', async () => {
        try {
            await navigator.clipboard.writeText('julienstaples.web@gmail.com');
            copyEmailLabel.textContent = 'Copied!';

            setTimeout(() => {
                copyEmailLabel.textContent = 'Copy email';
            }, 2000);
        } catch {
            copyEmailLabel.textContent = 'Select email above';
        }
    });
</script>

<?php wp_footer(); ?>
</body>

</html>