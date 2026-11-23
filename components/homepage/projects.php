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
        'image_url' => get_theme_file_uri( 'assets/imgs/ggb.webp' ),
        'mobile_image_url' => '',
        'url' => 'https://ggbenterprises.org/',
        'link_text' => 'Visit website',
        'highlights' => [
            'Responsive layouts' => 'Website layouts built for desktop and mobile visitors.',
            'Business presentation' => 'A finished customer-facing website with the company\'s information and content.',
        ],
        'about' => 'I built and launched this WordPress website for a small contracting business. I handled the page layouts, content setup, responsive implementation, and delivery, with the goal of presenting the business clearly to customers across different screen sizes.',
    ],
    [
        'id' => 'sipndrift',
        'title' => 'Sip & Drift',
        'subtitle' => 'Mobile bartending website',
        'description' => 'I built a website presenting mobile bartending services, packages, and a path toward booking.',
        'technologies' => [],
        'image_url' => get_theme_file_uri( 'assets/imgs/sipndrift.webp' ),
        'mobile_image_url' => '',
        'url' => 'https://sipdrift.shop/',
        'link_text' => 'Visit website',
        'highlights' => [
            'Services and packages' => 'Visitors can explore the mobile bartending services and package offerings.',
            'Path toward booking' => 'The website helps prospective customers take the next step toward booking.',
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
        'image_url' => get_theme_file_uri( 'assets/imgs/lang-app.webp' ),
        'mobile_image_url' => '',
        'url' => 'https://github.com/JulienStaples/lang-demo',
        'link_text' => 'View source on GitHub',
        'highlights' => [
            'Interactive reading' => 'Read and interact with text word by word.',
            'Vocabulary tracking' => 'Keep track of vocabulary while reading.',
            'Difficulty ratings' => 'Assign difficulty ratings to individual words.',
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
            'Custom WordPress theme' => 'Purpose-built PHP templates and reusable components.',
            'Interactive project explorer' => 'Switch between projects, screenshots, and details on the homepage.',
            'Responsive layout' => 'A single design system across desktop and mobile.',
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
