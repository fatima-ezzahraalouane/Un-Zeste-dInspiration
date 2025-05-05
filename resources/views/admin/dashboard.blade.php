<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <title>Un Zeste d'Inspiration - Dashboard Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

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
                    <button id="btn-categories"
                        class="dashboard-tab w-full text-left px-4 py-3 rounded flex items-center space-x-3 hover:bg-brand-peach/50">
                        <i class="fas fa-tags text-lg"></i>
                        <span>Gestion du Contenu</span>
                    </button>
                </div>
            </div>
        </aside>

        @if (session('success'))
        <div id="success-alert" class="flex justify-end">
            <div class="mt-2 fixed top-20 right-4 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded shadow-md">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
            </div>
        </div>
        @endif

        <!-- Main Content -->
        <main class="flex-1 p-4 md:p-8">

            @include('admin.sections.statistics')

            @include('admin.sections.user-management')

            @include('admin.sections.categories-tags')
        </main>
    </div>

    <!-- Scripts -->
    <script>
        // Mobile menu toggle
        const burgerMenu = document.getElementById('burger-menu');
        const mobileMenu = document.getElementById('mobile-menu');

        burgerMenu.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        const tabs = {
            statistics: {
                btn: document.getElementById('btn-statistics'),
                section: document.getElementById('statistics-section')
            },
            users: {
                btn: document.getElementById('btn-users'),
                section: document.getElementById('users-section')
            },
            categories: {
                btn: document.getElementById('btn-categories'),
                section: document.getElementById('categories-section')
            }
        };

        function switchTab(tabName) {
            Object.values(tabs).forEach(tab => {
                tab.btn.classList.remove('active');
                tab.section.classList.add('hidden');
            });

            tabs[tabName].btn.classList.add('active');
            tabs[tabName].section.classList.remove('hidden');
        }

        Object.entries(tabs).forEach(([name, tab]) => {
            tab.btn.addEventListener('click', () => switchTab(name));
        });
    </script>
    <script>
        setTimeout(() => {
            const alert = document.getElementById('success-alert');
            if (alert) {
                alert.style.transition = 'opacity 0.5s ease';
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 500);
            }
        }, 2000);
    </script>
    <script>
        function editCategory(id, name) {
            const form = document.getElementById('category-form');
            const nameInput = document.getElementById('category-name');
            const idInput = document.getElementById('category-id');
            const submitLabel = document.getElementById('submit-label');

            const route = "{{ route('categories.update', ':id') }}".replace(':id', id);
            form.action = route;
            nameInput.value = name;
            idInput.value = id;

            if (!form.querySelector('input[name="_method"]')) {
                const methodInput = document.createElement('input');
                methodInput.type = 'hidden';
                methodInput.name = '_method';
                methodInput.value = 'PUT';
                form.appendChild(methodInput);
            } else {
                form.querySelector('input[name="_method"]').value = 'PUT';
            }

            submitLabel.innerText = "Modifier la Catégorie";
        }
    </script>
    <script>
        function editTag(id, name) {
            const form = document.getElementById('tag-form');
            const nameInput = document.getElementById('tag-name');
            const idInput = document.getElementById('tag-id');
            const submitLabel = document.getElementById('tag-submit-label');

            form.action = "{{ route('tags.update', ':id') }}".replace(':id', id);
            nameInput.value = name;
            idInput.value = id;

            let methodInput = form.querySelector('input[name="_method"]');
            if (!methodInput) {
                methodInput = document.createElement('input');
                methodInput.type = 'hidden';
                methodInput.name = '_method';
                form.appendChild(methodInput);
            }
            methodInput.value = 'PUT';

            submitLabel.innerText = "Modifier le Tag";
        }
    </script>
    <script>
        function editTheme(id, name, description, image) {
            const form = document.getElementById('theme-form');
            const nameInput = document.getElementById('theme-name');
            const descriptionInput = document.getElementById('theme-description');
            const imageInput = document.getElementById('theme-image');
            const idInput = document.getElementById('theme-id');
            const submitLabel = document.getElementById('theme-submit-label');

            const route = "{{ route('themes.update', ':id') }}".replace(':id', id);
            form.action = route;
            nameInput.value = name;
            descriptionInput.value = description;
            imageInput.value = image;
            idInput.value = id;

            if (!form.querySelector('input[name="_method"]')) {
                const methodInput = document.createElement('input');
                methodInput.type = 'hidden';
                methodInput.name = '_method';
                methodInput.value = 'PUT';
                form.appendChild(methodInput);
            } else {
                form.querySelector('input[name="_method"]').value = 'PUT';
            }

            submitLabel.innerText = "Modifier le Thème";
        }
    </script>
</body>

</html>