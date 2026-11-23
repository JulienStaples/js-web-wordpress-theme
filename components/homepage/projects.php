<?php
$projects = [
    [
        'id' => 'ggb',
        'title' => 'GGB Enterprises',
        'subtitle' => 'Contracting business website',
        'description' => 'I built and launched a responsive WordPress website for a small contracting business.',
        'technologies' => [
            'WordPress',
        ],
        'image_url' => get_theme_file_uri( 'assets/imgs/ggb-home-desktop.png' ),
        'mobile_image_url' => get_theme_file_uri( 'assets/imgs/ggb-home-mobile.png' ),
        'url' => 'https://ggbenterprises.org/',
        'link_text' => 'Visit website',
        'highlights' => [
            'Responsive layouts' => [
                'summary' => 'Website layouts built for desktop and mobile visitors.',
                'details' => [
                    'I handled the responsive page layouts as part of the WordPress build.',
                    'The same business information is accessible across screen sizes.',
                ],
            ],
            'Business presentation' => [
                'summary' => 'A finished customer-facing website with the company\'s information and content.',
                'details' => [
                    'I organized and set up the company content across the website.',
                    'I completed the build and launch for the contracting business.',
                ],
            ],
        ],
        'about' => 'I built and launched this WordPress website for a small contracting business. I handled the page layouts, content setup, responsive implementation, and delivery, with the goal of presenting the business clearly to customers across different screen sizes.',
    ],
    [
        'id' => 'sipndrift',
        'title' => 'Sip & Drift',
        'subtitle' => 'Mobile bartending website',
        'description' => 'I built a website presenting mobile bartending services, packages, and a path toward booking.',
        'technologies' => [],
        'image_url' => get_theme_file_uri( 'assets/imgs/sipdrift-home-desktop.png' ),
        'mobile_image_url' => get_theme_file_uri( 'assets/imgs/sipdrift-home-mobile.png' ),
        'url' => 'https://sipdrift.shop/',
        'link_text' => 'Visit website',
        'highlights' => [
            'Services and packages' => [
                'summary' => 'Visitors can explore the mobile bartending services and package offerings.',
                'details' => [
                    'I structured the site around the business\'s service descriptions and package information.',
                    'The content presents the offerings together in a customer-facing experience.',
                ],
            ],
            'Path toward booking' => [
                'summary' => 'The website helps prospective customers take the next step toward booking.',
                'details' => [
                    'I organized the content so visitors can understand the services before taking the next step.',
                    'The project focuses on an understandable path toward booking, rather than a complex application.',
                ],
            ],
        ],
        'about' => 'I built the customer-facing website for Sip & Drift, organizing information about mobile bartending services, packages, and booking. The focus was on making the business and its offerings easy to understand and giving interested visitors a clear way to move forward.',
    ],
    [
        'id' => 'language-app',
        'title' => 'Language Learning Demo',
        'subtitle' => 'Interactive reading application',
        'description' => 'An interactive reading application with vocabulary tracking and difficulty ratings.',
        'technologies' => [
            'Next.js',
            'React',
            'TypeScript',
            'Tailwind CSS',
        ],
        'image_url' => get_theme_file_uri( 'assets/imgs/lang-demo-french-desktop.png' ),
        'mobile_image_url' => get_theme_file_uri( 'assets/imgs/lang-demo-french-mobile.png' ),
        'url' => 'https://github.com/JulienStaples/lang-demo',
        'link_text' => 'View source on GitHub',
        'highlights' => [
            'Interactive reading' => [
                'summary' => 'Read and interact with text word by word.',
                'details' => [
                    'Word-level interaction is part of the reading interface, rather than a separate tool.',
                    'The reading experience sits alongside vocabulary and difficulty features.',
                ],
            ],
            'Vocabulary tracking' => [
                'summary' => 'Keep track of vocabulary while reading.',
                'details' => [
                    'I built vocabulary tracking into the same interface used for reading.',
                    'This connects reading practice with an active vocabulary workflow.',
                ],
            ],
            'Difficulty ratings' => [
                'summary' => 'Assign difficulty ratings to individual words.',
                'details' => [
                    'Ratings apply at the word level rather than to an entire text.',
                    'Difficulty information works alongside the vocabulary features.',
                ],
            ],
        ],
        'about' => 'I built this interactive reading application using Next.js, React, TypeScript, and Tailwind CSS. It combines text interaction, vocabulary tracking, and word difficulty ratings in one interface, turning reading practice into something users can actively work through rather than just view.',
    ],
    [
        'id' => 'portfolio',
        'title' => 'This Portfolio',
        'subtitle' => 'Custom WordPress website',
        'description' => 'A purpose-built portfolio featuring a custom WordPress theme and interactive components.',
        'technologies' => [
            'WordPress',
            'PHP',
            'Tailwind CSS',
            'JavaScript',
        ],
        'image_url' => '',
        'mobile_image_url' => '',
        'url' => '',
        'link_text' => '',
        'highlights' => [
            'Custom WordPress theme' => [
                'summary' => 'Purpose-built PHP templates and reusable components.',
                'details' => [
                    'I organized homepage sections as reusable WordPress PHP template parts.',
                    'Tailwind CSS provides shared styling across the custom theme.',
                ],
            ],
            'Interactive project explorer' => [
                'summary' => 'Switch between projects, screenshots, and details on the homepage.',
                'details' => [
                    'Vanilla JavaScript switches the active project and its tabs without a page reload.',
                    'Each project has separate Preview, Highlights, and About views, with mobile previews where available.',
                ],
            ],
            'Responsive layout' => [
                'summary' => 'A single design system across desktop and mobile.',
                'details' => [
                    'Project selection surrounds the main spotlight on larger screens and reflows on smaller screens.',
                    'The same shared components and visual rules carry between layouts.',
                ],
            ],
        ],
        'about' => 'I built this portfolio as a custom WordPress theme, using reusable PHP template parts and Tailwind CSS for responsive styling. Vanilla JavaScript powers the project spotlight, NE6 screenshot gallery, and expandable capability cards without page reloads. A separate custom WordPress plugin is still in development.',
    ],
];

$active_project = 'language-app';
?>

<section id="projects" aria-labelledby="projects-heading" class="section">

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

    <div
        class="grid grid-cols-2 gap-3 lg:grid-cols-[minmax(0,1fr)_minmax(0,2.4fr)_minmax(0,1fr)] lg:grid-rows-2 lg:gap-4">

        <?php foreach ( array_slice( $projects, 0, 2 ) as $index => $project ) : ?>

            <div class="min-w-0 lg:col-start-1
                <?php echo 0 === $index ? 'lg:row-start-1' : 'lg:row-start-2'; ?>">

                <?php
                get_template_part(
                    'components/project-card',
                    null,
                    [
                        'project' => $project,
                        'active' => $project['id'] === $active_project,
                        'position' => 'before',
                    ]
                );
                ?>

            </div>

        <?php endforeach; ?>

        <div id="project-spotlight"
            class="col-span-2 min-w-0 overflow-hidden rounded-lg bg-light text-dark lg:col-span-1 lg:col-start-2 lg:row-span-2 lg:row-start-1">

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

        <?php foreach ( array_slice( $projects, 2, 2 ) as $index => $project ) : ?>

            <div class="min-w-0 lg:col-start-3
                <?php echo 0 === $index ? 'lg:row-start-1' : 'lg:row-start-2'; ?>">

                <?php
                get_template_part(
                    'components/project-card',
                    null,
                    [
                        'project' => $project,
                        'active' => $project['id'] === $active_project,
                        'position' => 'after',
                    ]
                );
                ?>

            </div>

        <?php endforeach; ?>

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

        function selectTab(panel, tabName) {
            panel.querySelectorAll('[data-spotlight-tab]').forEach(button => {
                const active = button.dataset.spotlightTab === tabName;

                button.setAttribute('aria-selected', String(active));
                button.tabIndex = active ? 0 : -1;
            });

            panel.querySelectorAll('[data-spotlight-content]').forEach(content => {
                content.hidden = content.dataset.spotlightContent !== tabName;
            });
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

            if (!nextPanel) return;

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

                if (bounds.top < 0 || bounds.bottom > window.innerHeight) {
                    heading.scrollIntoView({ block: 'center' });
                }
            }
        }

        section.addEventListener('click', event => {
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