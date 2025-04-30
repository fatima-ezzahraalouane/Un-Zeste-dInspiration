<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <title>Un Zeste d'Inspiration - Dashboard Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'brand-burgundy': '#793E37',
                        'brand-red': '#974344',
                        'brand-coral': '#B55D51',
                        'brand-peach': '#FFF0ED',
                        'brand-dark': '#4C4C4C',
                        'brand-gray': '#878787',
                        primary: '#793E37',
                        secondary: '#974344',
                    }
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Poppins:wght@300;400;500;600&display=swap');

        .playfair {
            font-family: 'Playfair Display', serif;
        }

        .poppins {
            font-family: 'Poppins', sans-serif;
        }

        .dashboard-tab {
            transition: all 0.3s ease;
        }

        .dashboard-tab.active {
            background-color: #FFF0ED;
            color: #793E37;
            border-left: 4px solid #793E37;
        }

        .shine-effect {
            position: relative;
            overflow: hidden;
        }

        .shine-effect::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(to bottom right,
                    rgba(255, 255, 255, 0) 0%,
                    rgba(255, 255, 255, 0.1) 50%,
                    rgba(255, 255, 255, 0) 100%);
            transform: rotate(45deg);
            animation: shine 3s infinite;
        }

        @keyframes shine {
            0% {
                transform: translateX(-100%) rotate(45deg);
            }

            100% {
                transform: translateX(100%) rotate(45deg);
            }
        }
    </style>
</head>

<body class="bg-gray-50 poppins">
    <!-- Navbar -->
    @include('partials.navbara')

    <!-- Dashboard Container -->
    <div class="flex flex-col md:flex-row pt-20 min-h-screen">
        <!-- Sidebar -->
        <aside class="w-full md:w-64 bg-white shadow-md md:min-h-screen">
            <div class="p-4">
                <h2 class="playfair text-xl font-bold text-brand-burgundy mb-6">Dashboard Admin</h2>
                <div class="space-y-2">
                    <button id="btn-statistics"
                        class="dashboard-tab active w-full text-left px-4 py-3 rounded flex items-center space-x-3 hover:bg-brand-peach/50">
                        <i class="fas fa-chart-pie text-lg"></i>
                        <span>Statistiques</span>
                    </button>
                    <button id="btn-users"
                        class="dashboard-tab w-full text-left px-4 py-3 rounded flex items-center space-x-3 hover:bg-brand-peach/50">
                        <i class="fas fa-users text-lg"></i>
                        <span>Gestion Utilisateurs</span>
                    </button>
                    <button id="btn-content"
                        class="dashboard-tab w-full text-left px-4 py-3 rounded flex items-center space-x-3 hover:bg-brand-peach/50">
                        <i class="fas fa-utensils text-lg"></i>
                        <span>Modération Contenu</span>
                    </button>
                    <button id="btn-categories"
                        class="dashboard-tab w-full text-left px-4 py-3 rounded flex items-center space-x-3 hover:bg-brand-peach/50">
                        <i class="fas fa-tags text-lg"></i>
                        <span>Catégories & Tags</span>
                    </button>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-4 md:p-8">
            <!-- Statistics Section -->
            @include('admin.sections.statistics')

            <!-- User Management Section (hidden by default) -->
            @include('admin.sections.user-management')

            <!-- Content Moderation Section (hidden by default) -->
            @include('admin.sections.content-moderation') 

            <!-- Categories & Tags Section (hidden by default) -->
            @include('admin.sections.categories-tags')
        </main>
    </div>

    <!-- Scripts -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        // Initialize AOS
        AOS.init();

        // Mobile menu toggle
        const burgerMenu = document.getElementById('burger-menu');
        const mobileMenu = document.getElementById('mobile-menu');

        burgerMenu.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        // Dashboard tabs functionality
        const tabs = {
            statistics: {
                btn: document.getElementById('btn-statistics'),
                section: document.getElementById('statistics-section')
            },
            users: {
                btn: document.getElementById('btn-users'),
                section: document.getElementById('users-section')
            },
            content: {
                btn: document.getElementById('btn-content'),
                section: document.getElementById('content-section')
            },
            categories: {
                btn: document.getElementById('btn-categories'),
                section: document.getElementById('categories-section')
            }
        };

        function switchTab(tabName) {
            // Remove active class from all tabs and hide all sections
            Object.values(tabs).forEach(tab => {
                tab.btn.classList.remove('active');
                tab.section.classList.add('hidden');
            });

            // Activate selected tab and show its section
            tabs[tabName].btn.classList.add('active');
            tabs[tabName].section.classList.remove('hidden');
        }

        // Add click event listeners to all tab buttons
        Object.entries(tabs).forEach(([name, tab]) => {
            tab.btn.addEventListener('click', () => switchTab(name));
        });
    </script>
    <script>
        const categoryTabs = document.querySelectorAll('.flex.border-b.border-gray-200 button');
        const categoryContent = document.querySelector('.grid.grid-cols-1.md\\:grid-cols-3.gap-6');
        const tagsManagement = document.getElementById('tags-management');
        const themesManagement = document.getElementById('themes-management');
        categoryTabs.forEach(tab => {
            tab.addEventListener('click', () => {
                // Remove active state from all tabs
                categoryTabs.forEach(t => {
                    t.classList.remove('border-b-2', 'border-brand-burgundy', 'text-brand-burgundy');
                    t.classList.add('text-gray-500');
                });

                // Add active state to clicked tab
                tab.classList.remove('text-gray-500');
                tab.classList.add('border-b-2', 'border-brand-burgundy', 'text-brand-burgundy');

                // Show/hide appropriate content
                if (tab.textContent.trim() === 'Catégories') {
                    categoryContent.classList.remove('hidden');
                    tagsManagement.classList.add('hidden');
                    themesManagement.classList.add('hidden');
                } else if (tab.textContent.trim() === 'Tags') {
                    categoryContent.classList.add('hidden');
                    tagsManagement.classList.remove('hidden');
                    themesManagement.classList.add('hidden');
                } else if (tab.textContent.trim() === 'Thèmes') {
                    categoryContent.classList.add('hidden');
                    tagsManagement.classList.add('hidden');
                    themesManagement.classList.remove('hidden');
                }
            });
        });
    </script>
    <!-- <script>
        const ctx = document.getElementById('categoryChart').getContext('2d');

        const categoryLabels = {!!json_encode($categories -> pluck('name')) !!};
        const categoryData = {!!json_encode($categories -> pluck('recipes_count')) !!};

        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: categoryLabels,
                datasets: [{
                    data: categoryData,
                    backgroundColor: [
                        '#793E37',
                        '#B55D51',
                        '#974344',
                        '#4C4C4C',
                    ],
                    borderWidth: 0,
                    hoverOffset: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                const label = context.label || '';
                                const value = context.parsed || 0;
                                const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                const percentage = Math.round((value * 100) / total);
                                return `${label}: ${value} (${percentage}%)`;
                            }
                        }
                    }
                },
                cutout: '70%'
            }
        });
    </script> -->


</body>

</html>