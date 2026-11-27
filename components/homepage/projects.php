<?php
$projects = [
    [
        'id' => 'ggb',
        'title' => 'GGB Enterprises',
        'subtitle' => 'Client Website',
        'description' => 'I worked with a small contracting business to build and launch its WordPress website, handling the page layouts and content as part of the project.',
        'technologies' => [ 'WordPress', 'Elementor', 'HTML', 'CSS', 'Figma', 'WPForms' ],
        'image_url' => get_theme_file_uri( 'assets/imgs/ggb-home-desktop.png' ),
        'mobile_image_url' => get_theme_file_uri( 'assets/imgs/ggb-home-mobile.png' ),
        'url' => 'https://ggbenterprises.org/',
        'link_text' => 'Visit website',
        'highlights' => [
            'Client & Project Planning' => [
                'paragraphs' => [
                    'I worked directly with the business owner to understand what he wanted from his website and what his customers needed to know. We worked through the design and content together, and I organized the site around his services, previous work, financing options and getting customers in touch for an estimate.',
                ],
            ],
            'Design & Development' => [
                'paragraphs' => [
                    'I worked on the designs in Figma before building the site in WordPress with Elementor. I used my own HTML and CSS where I needed more control over the layouts and set up the estimate request forms using WPForms.',
                ],
            ],
            'Launch & Delivery' => [
                'paragraphs' => [
                    'I handled the hosting and domain setup and worked through the client\'s feedback before launch. I tested the site on desktop and mobile, checked that the estimate request forms worked and made sure the client understood the ongoing costs of running the website.',
                ],
            ],
        ],
        'about' => [
            'GGB Enterprises is an independently owned contracting business that has been serving the Phoenix area since 2004. The company takes on a wide range of residential and commercial projects, from kitchen and bathroom renovations to room additions and new home construction.',
            'Their website introduces the business, showcases previous projects and gives prospective customers a place to explore services, find financing options and request a free estimate.',
        ],
    ],
    [
        'id' => 'sipndrift',
        'title' => 'Sip & Drift',
        'subtitle' => 'Client Website',
        'description' => 'I built this website for a mobile bartending business so customers could explore their services, compare packages and find out how to book.',
        'technologies' => [ 'WordPress', 'Elementor', 'HTML', 'CSS', 'JavaScript', 'PHP', 'Figma' ],
        'image_url' => get_theme_file_uri( 'assets/imgs/sipdrift-home-desktop.png' ),
        'mobile_image_url' => get_theme_file_uri( 'assets/imgs/sipdrift-home-mobile.png' ),
        'url' => 'https://sipdrift.shop/',
        'link_text' => 'Visit website',
        'highlights' => [
            'Client & Project Planning' => [
                'paragraphs' => [
                    'I worked with the owners of Sip & Drift to plan a website that reflected the personality of their mobile bartending business. The site needed to help customers compare packages, explore the drink menu and book services for different types of events without making the process complicated.',
                ],
            ],
            'Design & Development' => [
                'paragraphs' => [
                    'I worked on the visual design in Figma and built the site in WordPress using Elementor. I used custom HTML, CSS, JavaScript and PHP where I needed more control over the design and functionality of the site.',
                ],
            ],
            'Launch & Delivery' => [
                'paragraphs' => [
                    'I handled the move to WordPress, including transferring the existing content and creating anything that was missing. I worked through the client\'s feedback, tested the site across devices and took care of getting it live.',
                ],
            ],
        ],
        'about' => [
            'Sip & Drift is a mobile bartending business started by three friends who met while working in the restaurant industry. They provide bartending services for weddings, private parties and other events, with handcrafted cocktails and customizable bar packages.',
            'Their website introduces the team and their services, allows customers to compare packages based on the size and needs of their event, and provides a detailed cocktail menu for customers to explore before booking.',
        ],
    ],
    [
        'id' => 'language-app',
        'title' => 'Language Learning Demo',
        'subtitle' => 'Web Application',
        'description' => 'I built an app for reading in another language where you can keep track of your vocabulary and mark how difficult individual words are as you read.',
        'technologies' => [ 'Next.js', 'React', 'Node.js', 'TypeScript', 'Tailwind CSS' ],
        'image_url' => get_theme_file_uri( 'assets/imgs/lang-demo-french-desktop.png' ),
        'mobile_image_url' => get_theme_file_uri( 'assets/imgs/lang-demo-french-mobile.png' ),
        'url' => 'https://github.com/JulienStaples/lang-demo',
        'link_text' => 'View source on GitHub',
        'highlights' => [
            'Planning & Design' => [
                'paragraphs' => [
                    'The idea behind this project was to make it easier to learn a language through reading. I wanted readers to be able to work through a book in another language, look up unfamiliar words and build up their vocabulary naturally as they read.',
                    'I designed the interface around the text itself, using different colors to show how familiar the reader is with each word. Clicking on a word brings up the tools needed to work with it without losing your place in the text.',
                ],
            ],
            'Application Development' => [
                'paragraphs' => [
                    'I built the application in Next.js and React, using TypeScript to manage the different kinds of data the app works with. I used React Context to share information between components so that the reading interface and vocabulary tools could work together.',
                    'This project also gave me a reason to work with libraries I hadn\'t used before, including Compromise for natural language processing and shadcn/ui for building out the interface.',
                ],
            ],
            'Features & Functionality' => [
                'bullets' => [
                    [ 'label' => 'Reading', 'text' => 'Each word in the text is interactive, allowing readers to work with individual words without interrupting their reading.' ],
                    [ 'label' => 'Vocabulary', 'text' => 'Readers can keep track of the words they\'re learning and update their familiarity with them over time.' ],
                    [ 'label' => 'Difficulty', 'text' => 'Words are color coded according to their difficulty rating, giving readers a visual sense of how much of the text they understand.' ],
                ],
            ],
            'Performance & Testing' => [
                'paragraphs' => [
                    'I noticed a slowdown when switching between pages of text, but strangely, going from a longer page to a shorter one was slower than the other way around. I expected rendering more content to be the expensive part.',
                    'Using React Developer Tools, I found that removing the existing word elements was more expensive in my application than rendering new ones. This changed how I approached the performance problem and gave me a better understanding of how React handles updates.',
                ],
            ],
        ],
        'about' => [
            'This application is based on the idea of learning a language through exposure to meaningful content. Rather than following a predetermined curriculum, learners can read about subjects they\'re interested in and encounter vocabulary in its natural context.',
            'As learners progress, they encounter familiar words in different sentences and situations, gradually developing an understanding of how the language is used beyond individual definitions.',
        ],
    ],
    [
        'id' => 'portfolio',
        'site_url' => 'https://julienstaplesweb.com/',
        'title' => 'This Website',
        'subtitle' => 'Custom WordPress Theme',
        'description' => 'I built my own WordPress theme for this site, including the interactive project viewer you\'re using right now.',
        'technologies' => [ 'WordPress', 'PHP', 'HTML', 'Tailwind CSS', 'JavaScript', 'GSAP' ],
        'image_url' => '',
        'mobile_image_url' => '',
        'url' => 'https://github.com/JulienStaples/js-web-wordpress-theme',
        'link_text' => 'View source on GitHub',
        'highlights' => [
            'Planning & Design' => [
                'paragraphs' => [
                    'I designed this site around how people actually look through portfolios, particularly recruiters who might only spend a few seconds here. I wanted the most important information to be easy to find without having to navigate through several pages.',
                    'I spent time researching how people scan websites and used that research to guide the layout, content and interactions. There\'s more detail available throughout the site for anyone who wants to spend a little longer looking through my work.',
                ],
            ],
            'Custom WordPress Theme' => [
                'paragraphs' => [
                    'I wanted to build this site without relying on a page builder or an existing theme, so I developed my own WordPress theme using PHP and Tailwind CSS.',
                    'I broke the site into reusable templates and components to keep the code organized and make it easier to change individual parts of the site without affecting everything else. WordPress gives me a way to manage the content separately from the design and functionality.',
                ],
            ],
            'Interactive Features' => [
                'paragraphs' => [
                    'I built the interactive parts of this site using vanilla JavaScript and GSAP. The project viewer, screenshot gallery and expandable cards let visitors explore my work without having to leave the homepage.',
                    'I also wanted these interactions to work just as well on mobile and be usable with a keyboard, so I took that into account when building the components.',
                ],
            ],
        ],
        'about' => [
            'This website is both my professional portfolio and an ongoing personal project. It brings together my professional experience, client work and some of the things I\'ve built while exploring new areas of web development.',
            'It also gives me a place to experiment with ideas and technologies outside of my day to day work. As I learn new things, I have somewhere to put them into practice.',
        ],
    ],
];

$active_project = 'language-app';
?>

<section id="projects" aria-labelledby="projects-heading" class="section">

    <div class="flex min-w-0 items-center gap-2">
        <div class="min-w-0 flex-1">
            <?php
            get_template_part(
                'components/section-heading',
                null,
                [
                    'number' => '02',
                    'title' => 'Portfolio',
                    'id' => 'projects-heading',
                ]
            );
            ?>
        </div>

        <div class="flex shrink-0 items-center gap-2 lg:hidden" role="group" aria-label="Project selector navigation">
            <button type="button" data-project-scroll="previous" aria-label="Scroll to previous projects"
                aria-controls="project-selector" aria-disabled="true"
                class="flex size-12 shrink-0 cursor-pointer items-center justify-center rounded-md border border-light/60 text-light hover:bg-dark-surface focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-light aria-disabled:cursor-default aria-disabled:border-transparent aria-disabled:opacity-30 aria-disabled:hover:bg-transparent">
                <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="m15 18-6-6 6-6" />
                </svg>
            </button>
            <button type="button" data-project-scroll="next" aria-label="Scroll to next projects"
                aria-controls="project-selector" aria-disabled="true"
                class="flex size-12 shrink-0 cursor-pointer items-center justify-center rounded-md border border-light/60 text-light hover:bg-dark-surface focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-light aria-disabled:cursor-default aria-disabled:border-transparent aria-disabled:opacity-30 aria-disabled:hover:bg-transparent">
                <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="m9 18 6-6-6-6" />
                </svg>
            </button>
        </div>
    </div>

    <div class="grid min-w-0 gap-3 lg:grid-cols-[minmax(0,1fr)_minmax(0,2.4fr)_minmax(0,1fr)] lg:grid-rows-2 lg:gap-4">

        <div id="project-selector" class="-m-1 flex min-w-0 snap-x snap-mandatory gap-3 overflow-x-auto p-1 scroll-px-1 [scrollbar-width:none] [&::-webkit-scrollbar]:hidden lg:contents">

            <?php foreach ( $projects as $index => $project ) : ?>

                <div class="w-[min(13rem,85%)] min-w-0 shrink-0 snap-start sm:w-[min(15rem,85%)] lg:w-auto
                    <?php echo $index < 2 ? 'lg:col-start-1' : 'lg:col-start-3'; ?>
                    <?php echo 0 === $index % 2 ? 'lg:row-start-1' : 'lg:row-start-2'; ?>">

                    <?php
                    get_template_part(
                        'components/project-card',
                        null,
                        [
                            'project' => $project,
                            'active' => $project['id'] === $active_project,
                            'position' => $index < 2 ? 'before' : 'after',
                        ]
                    );
                    ?>

                </div>

            <?php endforeach; ?>

        </div>

        <div id="project-spotlight"
            class="min-w-0 overflow-hidden rounded-lg bg-light text-dark lg:col-start-2 lg:row-span-2 lg:row-start-1">

            <?php foreach ( $projects as $project ) : ?>

                <?php
                get_template_part(
                    'components/project-spotlight',
                    null,
                    [
                        'project' => $project,
                        'active' => $project['id'] === $active_project,
                    ]
                );
                ?>

            <?php endforeach; ?>

        </div>

    </div>

</section>



<script>
    (() => {
        const section = document.getElementById('projects');

        if (!section) return;

        const selectors = [
            ...section.querySelectorAll('[data-project-selector]')
        ];

        const panels = [
            ...section.querySelectorAll('[data-project-panel]')
        ];

        const scroller = section.querySelector('#project-selector');
        const previous = section.querySelector('[data-project-scroll="previous"]');
        const next = section.querySelector('[data-project-scroll="next"]');

        function updateScrollControls() {
            const maxScroll = scroller.scrollWidth - scroller.clientWidth;

            previous.setAttribute('aria-disabled', String(scroller.scrollLeft <= 1));
            next.setAttribute('aria-disabled', String(scroller.scrollLeft >= maxScroll - 1));
        }

        function scrollProjects(control) {
            if (control.getAttribute('aria-disabled') === 'true') return;

            const cards = [...scroller.children];
            const firstLeft = cards[0].getBoundingClientRect().left;
            const maxScroll = Math.max(0, scroller.scrollWidth - scroller.clientWidth);
            const current = scroller.scrollLeft;
            const stops = cards.map(card => Math.min(maxScroll, card.getBoundingClientRect().left - firstLeft));
            const forward = control === next;
            const target = forward
                ? stops.find(stop => stop > current + 1) ?? maxScroll
                : stops.reverse().find(stop => stop < current - 1) ?? 0;

            scroller.scrollTo({
                left: target,
                behavior: window.matchMedia('(prefers-reduced-motion: reduce)').matches ? 'instant' : 'smooth'
            });
        }

        scroller.addEventListener('scroll', updateScrollControls, { passive: true });
        new ResizeObserver(updateScrollControls).observe(scroller);
        updateScrollControls();

        function selectTab(panel, tabName) {
            panel.querySelectorAll('[data-spotlight-tab]').forEach(button => {
                const active = button.dataset.spotlightTab === tabName;

                button.setAttribute('aria-selected', String(active));
                button.tabIndex = active ? 0 : -1;
            });

            panel.querySelectorAll('[data-spotlight-content]').forEach(content => {
                content.hidden = content.dataset.spotlightContent !== tabName;
            });

            const controls = panel.querySelector('[data-preview-controls]');
            if (controls) controls.hidden = tabName !== 'preview';
        }

        function selectDevice(panel, device) {
            panel.querySelectorAll('[data-preview-toggle]').forEach(button => {
                const active = button.dataset.previewToggle === device;

                button.setAttribute('aria-pressed', String(active));
            });

            panel.querySelectorAll('[data-preview-view]').forEach(preview => {
                preview.hidden = preview.dataset.previewView !== device;
            });
        }

        function selectProject(projectId) {
            const nextPanel = panels.find(
                panel => panel.dataset.projectPanel === projectId
            );

            if (!nextPanel || !nextPanel.hidden) return;

            selectors.forEach(button => {
                const active = button.dataset.projectSelector === projectId;

                button.setAttribute('aria-pressed', String(active));
            });

            panels.forEach(panel => {
                panel.hidden = panel !== nextPanel;
            });

            selectTab(nextPanel, 'preview');
            selectDevice(nextPanel, 'desktop');

            const heading = nextPanel.querySelector('[data-project-heading]');

            if (heading) {
                heading.focus({ preventScroll: true });

                const bounds = heading.getBoundingClientRect();

                const header = document.getElementById('site-header');
                const visibleTop = header && !header.classList.contains('header-in-flow') ? Math.max(0, header.getBoundingClientRect().bottom) : 0;

                if (bounds.top < visibleTop || bounds.bottom > window.innerHeight) {
                    heading.scrollIntoView({ block: 'center', inline: 'nearest' });
                }
            }
        }

        section.addEventListener('click', event => {
            const scrollControl = event.target.closest('[data-project-scroll]');

            if (scrollControl) {
                scrollProjects(scrollControl);
                return;
            }

            const selector = event.target.closest('[data-project-selector]');

            if (selector) {
                selectProject(selector.dataset.projectSelector);
                return;
            }

            const panel = event.target.closest('[data-project-panel]');

            if (!panel) return;

            const tab = event.target.closest('[data-spotlight-tab]');

            if (tab) {
                selectTab(panel, tab.dataset.spotlightTab);
                return;
            }

            const device = event.target.closest('[data-preview-toggle]');

            if (device) {
                selectDevice(panel, device.dataset.previewToggle);
            }
        });

        section.addEventListener('keydown', event => {
            const current = event.target.closest('[data-spotlight-tab]');

            if (!current) return;

            const panel = current.closest('[data-project-panel]');

            const tabs = [
                ...panel.querySelectorAll('[data-spotlight-tab]')
            ];

            const index = tabs.indexOf(current);

            let nextIndex;

            switch (event.key) {
                case 'ArrowRight':
                    nextIndex = (index + 1) % tabs.length;
                    break;

                case 'ArrowLeft':
                    nextIndex = (index - 1 + tabs.length) % tabs.length;
                    break;

                case 'Home':
                    nextIndex = 0;
                    break;

                case 'End':
                    nextIndex = tabs.length - 1;
                    break;

                default:
                    return;
            }

            event.preventDefault();

            const nextTab = tabs[nextIndex];

            selectTab(panel, nextTab.dataset.spotlightTab);
            nextTab.focus();
        });
    })();
</script>