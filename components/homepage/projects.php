<?php
$projects = [
    [
        'id' => 'ggb',
        'title' => 'GGB Enterprises',
        'subtitle' => 'Contracting business website',
        'description' => 'I built and launched a responsive WordPress website for a small contracting business.',
        'contribution' => 'Website implementation, responsive layouts, content, and launch.',
        'technologies' => [
            'WordPress',
        ],
        'image_url' => get_theme_file_uri( 'assets/imgs/ggb.webp' ),
        'mobile_image_url' => '',
        'url' => 'https://ggbenterprises.org/',
        'link_text' => 'Visit website',
        'features' => [
            'Responsive layouts' => 'Website layouts for desktop and mobile devices.',
            'Business website' => 'Customer-facing business information and content.',
        ],
        'build' => [
            'WordPress' => 'Website implementation and content management.',
            'Website delivery' => 'Content setup, responsive implementation, and launch.',
        ],
    ],
    [
        'id' => 'sipndrift',
        'title' => 'Sip & Drift',
        'subtitle' => 'Mobile bartending website',
        'description' => 'I built a website presenting mobile bartending services, packages, and a path toward booking.',
        'contribution' => 'Website development and customer-facing service presentation.',
        'technologies' => [],
        'image_url' => get_theme_file_uri( 'assets/imgs/sipndrift.webp' ),
        'mobile_image_url' => '',
        'url' => 'https://sipdrift.shop/',
        'link_text' => 'Visit website',
        'features' => [
            'Services' => 'Presentation of mobile bartending services.',
            'Packages' => 'Information about available packages.',
            'Booking' => 'A path for prospective customers to book.',
        ],
        'build' => [
            'Website development' => 'Implementation of the customer-facing website.',
            'Content organization' => 'Presentation of services and package information.',
        ],
    ],
    [
        'id' => 'language-app',
        'title' => 'Language Learning Demo',
        'subtitle' => 'Interactive reading application',
        'description' => 'An interactive reading application with vocabulary tracking and difficulty ratings.',
        'contribution' => 'Developed the application and its interactive reading and vocabulary functionality.',
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
        'features' => [
            'Interactive reading' => 'Work through a text word by word.',
            'Vocabulary tracking' => 'Track vocabulary while reading.',
            'Difficulty ratings' => 'Save difficulty ratings for individual words.',
        ],
        'build' => [
            'Next.js & React' => 'Application structure and interactive components.',
            'TypeScript' => 'Typed application development.',
            'Compromise NLP' => 'Natural language processing integration.',
        ],
    ],
    [
        'id' => 'portfolio',
        'title' => 'This Portfolio',
        'subtitle' => 'Custom WordPress website',
        'description' => 'A purpose-built portfolio featuring a custom WordPress theme and interactive components.',
        'contribution' => 'Custom theme development, responsive components, and a custom plugin currently in development.',
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
        'features' => [
            'Responsive design' => 'Layouts designed for different screen sizes.',
            'Project explorer' => 'Interactive presentation of portfolio projects.',
            'Custom theme' => 'Purpose-built WordPress templates and components.',
        ],
        'build' => [
            'WordPress & PHP' => 'Custom theme templates and reusable components.',
            'Tailwind CSS' => 'Responsive layouts and reusable styling.',
            'JavaScript' => 'Interactive interface components.',
            'Custom plugin' => 'Development in progress.',
        ],
    ],
];

$active_project = 'language-app';
?>

<section id="projects" aria-labelledby="projects-heading" class="section gap-6">

    <div class="flex items-center gap-6">
        <h2 id="projects-heading">Portfolio</h2>

        <hr class="h-px min-w-0 flex-1 border-0 bg-border" aria-hidden="true">
    </div>

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
            class="col-span-2 min-w-0 overflow-hidden rounded-lg bg-dark text-light lg:col-span-1 lg:col-start-2 lg:row-span-2 lg:row-start-1">

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