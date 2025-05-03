<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <title>Un Zeste d'Inspiration - Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
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

        .profile-tab {
            transition: all 0.3s ease;
        }

        .profile-tab.active {
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

        .recette-card {
            transition: all 0.3s ease;
        }

        .recette-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body class="poppins brand-peach">
    <!-- Navbar -->
    @include('partials.navbarch')

    <!-- Main Content -->
    <main class="pt-32 pb-16 px-4 sm:px-6 max-w-7xl mx-auto">
        <div class="flex flex-col md:flex-row gap-8">
            <!-- Sidebar -->
            <div class="w-full md:w-1/4">
                <div class="bg-white rounded-lg shadow-xl overflow-hidden sticky top-28">
                    <div class="flex flex-col items-center p-6 border-b border-gray-200">
                        <div class="relative group mb-4">
                            <div class="w-24 h-24 rounded-full overflow-hidden border-4 border-brand-burgundy">
                                <img src="{{ $chef->user->avatar ?? 'https://img.freepik.com/premium-vector/vector-chef-character-design_746655-2375.jpg?w=740' }}" alt="Photo de profil" class="w-full h-full object-cover">
                            </div>
                            <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                <label for="profile-picture" class="w-24 h-24 rounded-full bg-black/50 flex items-center justify-center cursor-pointer">
                                    <i class="fas fa-camera text-white text-xl"></i>
                                    <input type="file" id="profile-picture" class="hidden">
                                </label>
                            </div>
                        </div>
                        <h1 class="playfair text-xl font-bold text-brand-burgundy">
                            {{ $chef->user->last_name }} {{ $chef->user->first_name }}
                        </h1>
                        <p class="text-brand-gray text-sm">
                            Membre depuis {{ \Carbon\Carbon::parse($chef->user->created_at)->translatedFormat('F Y') }}
                        </p>
                    </div>

                    <div class="p-4">
                        <div id="tab-personal" onclick="changeTab('personal')" class="profile-tab active flex items-center p-3 mb-2 cursor-pointer rounded">
                            <i class="fas fa-user-circle w-6 text-center"></i>
                            <span class="ml-3">Informations Personnelles</span>
                        </div>
                        <div id="tab-recettes" onclick="changeTab('recettes')" class="profile-tab flex items-center p-3 mb-2 cursor-pointer rounded">
                            <i class="fas fa-utensils w-6 text-center"></i>
                            <span class="ml-3">Mes Recettes</span>
                        </div>
                        <div id="tab-stats" onclick="changeTab('stats')" class="profile-tab flex items-center p-3 mb-2 cursor-pointer rounded">
                            <i class="fas fa-chart-pie w-6 text-center"></i>
                            <span class="ml-3">Statistiques</span>
                        </div>
                        <div id="tab-settings" onclick="changeTab('settings')" class="profile-tab flex items-center p-3 mb-2 cursor-pointer rounded">
                            <i class="fas fa-cog w-6 text-center"></i>
                            <span class="ml-3">Paramètres</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Area -->
            <div class="w-full md:w-3/4">
                <!-- Personal Information Section -->
                @include('chef.sections.personal')

                <!-- Recettes Section -->
                @include('chef.sections.recettes')

                <!-- Statistics Section -->
                @include('chef.sections.stats')

                <!-- Settings Section -->
                @include('chef.sections.settings')
            </div>
        </div>
    </main>

    <!-- Scripts -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        // Initialize AOS animations
        AOS.init({
            duration: 800,
            easing: 'ease-in-out'
        });

        // Mobile menu toggle
        document.getElementById('burger-menu').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });

        // Tab navigation
        function changeTab(tabId) {
            // Hide all sections
            document.getElementById('personal-section').classList.add('hidden');
            document.getElementById('recettes-section').classList.add('hidden');
            document.getElementById('stats-section').classList.add('hidden');
            document.getElementById('settings-section').classList.add('hidden');

            // Remove active class from all tabs
            document.getElementById('tab-personal').classList.remove('active');
            document.getElementById('tab-recettes').classList.remove('active');
            document.getElementById('tab-stats').classList.remove('active');
            document.getElementById('tab-settings').classList.remove('active');

            // Show selected section and activate tab
            document.getElementById(tabId + '-section').classList.remove('hidden');
            document.getElementById('tab-' + tabId).classList.add('active');
        }

        // Edit profile toggle
        document.getElementById('edit-profile-btn').addEventListener('click', function() {
            document.getElementById('view-profile').classList.add('hidden');
            document.getElementById('edit-profile').classList.remove('hidden');
        });

        document.getElementById('cancel-edit').addEventListener('click', function() {
            document.getElementById('edit-profile').classList.add('hidden');
            document.getElementById('view-profile').classList.remove('hidden');
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
        const specialtiesList = document.getElementById('specialties-list');
        const hiddenInput = document.getElementById('specialties-hidden');
        const inputField = document.getElementById('specialty-input');
        const addBtn = document.getElementById('add-specialty-btn');

        // Ajouter une spécialité
        addBtn.addEventListener('click', () => {
            const value = inputField.value.trim();
            if (value !== '') {
                // Créer le chip
                const chip = document.createElement('div');
                chip.className = 'chip bg-brand-peach text-brand-burgundy px-3 py-1 rounded-full text-sm flex items-center';
                chip.innerHTML = `${value} <button type="button" class="ml-2 text-xs remove-specialty">&times;</button>`;
                specialtiesList.appendChild(chip);
                inputField.value = '';

                updateHiddenField();
            }
        });

        // Supprimer une spécialité
        specialtiesList.addEventListener('click', (e) => {
            if (e.target.classList.contains('remove-specialty')) {
                e.target.parentElement.remove();
                updateHiddenField();
            }
        });

        // Met à jour le champ caché avec la liste des spécialités
        function updateHiddenField() {
            const chips = specialtiesList.querySelectorAll('.chip');
            const values = Array.from(chips).map(chip => chip.firstChild.textContent.trim());
            hiddenInput.value = values.join(',');
        }
    </script>
    <script>
        const modal = document.getElementById("recipeModal");
        const openModalBtn = document.getElementById("openModal");
        const closeModalBtn = document.getElementById("closeModal");

        // Open Add Recipe Modal
        openModalBtn.addEventListener("click", () => {
            modal.classList.remove("hidden");
        });

        // Close Add Recipe Modal
        closeModalBtn.addEventListener("click", () => {
            modal.classList.add("hidden");
        });

        // Close Add Recipe Modal when clicking outside
        window.addEventListener("click", (event) => {
            if (event.target === modal) {
                modal.classList.add("hidden");
            }
            if (event.target === editModal) {
                editModal.classList.add("hidden");
            }
        });
    </script>
    <script>
        function openEditRecipeModal(button) {
            const modal = document.getElementById('editRecipeModal');
            const form = document.getElementById('editRecipeForm');

            const recipeId = button.dataset.id;
            const title = button.dataset.title;
            const image = button.dataset.image;
            const description = button.dataset.description;
            const preparation = button.dataset.preparation;
            const cooking = button.dataset.cooking;
            const servings = button.dataset.servings;
            const complexity = button.dataset.complexity;
            const categoryId = button.dataset.category;
            const tags = JSON.parse(button.dataset.tags);
            const ingredients = button.dataset.ingredients;
            const instructions = button.dataset.instructions;

            document.getElementById('edit-recipe-id').value = recipeId;

            document.getElementById('edit-title').value = title;
            document.getElementById('edit-image').value = image;
            document.getElementById('edit-description').value = description;
            document.getElementById('edit-preparation').value = preparation;
            document.getElementById('edit-cooking').value = cooking;
            document.getElementById('edit-servings').value = servings;
            document.getElementById('edit-complexity').value = complexity;
            document.getElementById('edit-category').value = categoryId;
            document.getElementById('edit-ingredients').value = ingredients;
            document.getElementById('edit-instructions').value = instructions;

            const selectTags = document.getElementById('edit-tags');
            for (let option of selectTags.options) {
                option.selected = tags.includes(parseInt(option.value));
            }

            form.action = "{{ route('recipes.update', ':id') }}".replace(':id', recipeId);

            modal.classList.remove('hidden');
        }

        document.getElementById('closeEditRecipeModal').addEventListener('click', () => {
            document.getElementById('editRecipeModal').classList.add('hidden');
        });
    </script>
</body>

</html>