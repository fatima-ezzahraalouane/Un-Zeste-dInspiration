<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <title>Un Zeste d'Inspiration - Mon Profil</title>
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

        .experience-card {
            transition: all 0.3s ease;
        }

        .experience-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body class="poppins brand-peach">
    <!-- Navbar -->
    @include('partials.navbarc')

    <!-- Main Content -->
    <main class="pt-32 pb-16 px-4 sm:px-6 max-w-7xl mx-auto">
        <div class="flex flex-col md:flex-row gap-8">
            <!-- Sidebar -->
            <div class="w-full md:w-1/4">
                <div class="bg-white rounded-lg shadow-xl overflow-hidden sticky top-28">
                    <div class="flex flex-col items-center p-6 border-b border-gray-200">
                        <div class="relative group mb-4">
                            <div class="w-24 h-24 rounded-full overflow-hidden border-4 border-brand-burgundy">
                                <img src="{{ $gourmand->user->avatar ?? 'https://atomic.site/wp-content/uploads/2019/02/Avatar.png' }}" alt="Photo de profil" class="w-full h-full object-cover">
                            </div>
                        </div>
                        <h1 class="playfair text-xl font-bold text-brand-burgundy">
                            {{ $gourmand->user->first_name }} {{ $gourmand->user->last_name }}
                        </h1>
                        <p class="text-brand-gray text-sm">
                            Membre depuis {{ \Carbon\Carbon::parse($gourmand->user->created_at)->translatedFormat('F Y') }}
                        </p>
                    </div>
                    <div class="p-4">
                        <div id="tab-personal" onclick="changeTab('personal')" class="profile-tab active flex items-center p-3 mb-2 cursor-pointer rounded">
                            <i class="fas fa-user-circle w-6 text-center"></i>
                            <span class="ml-3">Informations Personnelles</span>
                        </div>
                        <div id="tab-experiences" onclick="changeTab('experiences')" class="profile-tab flex items-center p-3 mb-2 cursor-pointer rounded">
                            <i class="fas fa-utensils w-6 text-center"></i>
                            <span class="ml-3">Mes Expériences Culinaires</span>
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
                @include('gourmand.sections.personal')

                <!-- Experiences Section -->
                @include('gourmand.sections.experiences')

                <!-- Statistics Section -->
                @include('gourmand.sections.stats')

                <!-- Settings Section -->
                @include('gourmand.sections.settings')
            </div>
        </div>
    </main>

    <!-- Footer -->
    @include('partials.footerc')

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
            document.getElementById('experiences-section').classList.add('hidden');
            document.getElementById('stats-section').classList.add('hidden');
            document.getElementById('settings-section').classList.add('hidden');

            // Remove active class from all tabs
            document.getElementById('tab-personal').classList.remove('active');
            document.getElementById('tab-experiences').classList.remove('active');
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

    //     setTimeout(() => {
    //     const alert = document.getElementById('error-message');
    //     if (alert) {
    //         alert.style.transition = 'opacity 0.5s ease';
    //         alert.style.opacity = '0';
    //         setTimeout(() => alert.remove(), 500);
    //     }
    // }, 4000);
    </script>
    <script>
        const modal = document.getElementById("experienceModal");
        const openModalBtn = document.getElementById("openModal");
        const closeModalBtn = document.getElementById("closeModal");
        const editModal = document.getElementById("editExperienceModal");
        const closeEditModalBtn = document.getElementById("closeEditModal");
        const editForm = document.getElementById("editExperienceForm");

        // Open Add Experience Modal
        openModalBtn.addEventListener("click", () => {
            modal.classList.remove("hidden");
        });

        // Close Add Experience Modal
        closeModalBtn.addEventListener("click", () => {
            modal.classList.add("hidden");
        });

        // Close Add Experience Modal when clicking outside
        window.addEventListener("click", (event) => {
            if (event.target === modal) {
                modal.classList.add("hidden");
            }
            if (event.target === editModal) {
                editModal.classList.add("hidden");
            }
        });

        // Open Edit Experience Modal and populate fields
        function openEditModal(button) {
            const experienceId = button.dataset.experienceId;
            const title = button.dataset.experienceTitle;
            const description = button.dataset.experienceDescription;
            const image = button.dataset.experienceImage;
            const themeId = button.dataset.experienceTheme;

            // Populate form fields
            document.getElementById("edit-experience-id").value = experienceId;
            document.getElementById("edit-title").value = title;
            document.getElementById("edit-description").value = description;
            document.getElementById("edit-image").value = image;
            document.getElementById("edit-theme-id").value = themeId;

            // Set form action using Laravel route
            editForm.action = "{{ route('experiences.update', ':id') }}".replace(':id', experienceId);

            // Show edit modal
            editModal.classList.remove("hidden");
        }

        // Close Edit Experience Modal
        closeEditModalBtn.addEventListener("click", () => {
            editModal.classList.add("hidden");
        });
    </script>
</body>

</html>