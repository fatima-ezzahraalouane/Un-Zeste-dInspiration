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
                                <img src="https://intranet.youcode.ma/storage/users/profile/1384-1728486655.JPG" alt="Photo de profil" class="w-full h-full object-cover">
                            </div>
                            <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                <label for="profile-picture" class="w-24 h-24 rounded-full bg-black/50 flex items-center justify-center cursor-pointer">
                                    <i class="fas fa-camera text-white text-xl"></i>
                                    <input type="file" id="profile-picture" class="hidden">
                                </label>
                            </div>
                        </div>
                        <h1 class="playfair text-xl font-bold text-brand-burgundy">Fatima-Ezzahra Alouane</h1>
                        <p class="text-brand-gray text-sm">Membre depuis Janvier 2025</p>
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
                <section id="personal-section" class="bg-white rounded-lg p-6 mb-8 shadow-xl">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="playfair text-2xl font-bold text-brand-burgundy">Informations Personnelles</h2>
                        <button id="edit-profile-btn" class="text-brand-burgundy hover:text-brand-coral">
                            <i class="fas fa-edit"></i> Modifier
                        </button>
                    </div>

                    <!-- View Mode -->
                    <div id="view-profile" class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <p class="text-brand-gray text-sm">Nom</p>
                                <p class="font-medium">Alouane</p>
                            </div>
                            <div>
                                <p class="text-brand-gray text-sm">Prénom</p>
                                <p class="font-medium">Fatima-Ezzahra</p>
                            </div>
                            <div>
                                <p class="text-brand-gray text-sm">Email</p>
                                <p class="font-medium">fatimaezzahra@email.com</p>
                            </div>
                            <div>
                                <p class="text-brand-gray text-sm">Localisation</p>
                                <p class="font-medium">Safi, Maroc</p>
                            </div>
                        </div>
                        <div>
                            <p class="text-brand-gray text-sm">À propos de moi</p>
                            <p class="font-medium">Passionnée de cuisine depuis mon plus jeune âge,
                                j'aime particulièrement expérimenter avec les saveurs méditerranéennes et asiatiques.
                                Je partage ici mes découvertes culinaires.</p>
                        </div>
                    </div>

                    <!-- Edit Mode -->
                    <form id="edit-profile" class="hidden space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-brand-gray text-sm mb-1" for="last-name">Nom</label>
                                <input type="text" id="last-name" value="Alouane" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-brand-burgundy">
                            </div>
                            <div>
                                <label class="block text-brand-gray text-sm mb-1" for="first-name">Prénom</label>
                                <input type="text" id="first-name" value="Fatima-Ezzahra" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-brand-burgundy">
                            </div>
                            <div>
                                <label class="block text-brand-gray text-sm mb-1" for="email">Email</label>
                                <input type="email" id="email" value="fatimaezzahra@email.com" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-brand-burgundy">
                            </div>
                            <div>
                                <label class="block text-brand-gray text-sm mb-1" for="location">Localisation</label>
                                <input type="text" id="location" value="Safi, Maroc" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-brand-burgundy">
                            </div>
                        </div>
                        <div>
                            <label class="block text-brand-gray text-sm mb-1" for="about">À propos de moi</label>
                            <textarea id="about" rows="4" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-brand-burgundy">Passionnée de cuisine depuis mon plus jeune âge, j'aime particulièrement expérimenter avec les saveurs méditerranéennes et asiatiques. Je partage ici mes découvertes culinaires et mes recettes préférées.</textarea>
                        </div>
                        <div class="flex justify-end space-x-4 pt-4">
                            <button type="button" id="cancel-edit" class="px-4 py-2 border border-brand-burgundy text-brand-burgundy rounded hover:bg-brand-peach transition-colors">Annuler</button>
                            <button type="submit" class="px-4 py-2 bg-brand-burgundy text-white rounded hover:bg-brand-coral transition-colors">Enregistrer</button>
                        </div>
                    </form>
                </section>

                <!-- Experiences Section -->
                <section id="experiences-section" class="bg-white rounded-lg shadow-xl p-6 mb-8 hidden">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="playfair text-2xl font-bold text-brand-burgundy">Mes Expériences Culinaires</h2>
                        <a href="#" class="shine-effect px-4 py-2 bg-brand-burgundy text-white rounded-full hover:shadow-lg transform hover:scale-105 transition-all duration-300">
                            <i class="fas fa-plus mr-2"></i> Nouvelle Expérience
                        </a>
                    </div>

                    <div class="mb-6">
                        <div class="relative">
                            <input type="text" placeholder="Rechercher vos expériences..." class="w-full p-3 pl-10 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-brand-burgundy">
                            <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-brand-gray"></i>
                        </div>
                    </div>

                    <!-- Filters -->
                    <div class="flex flex-wrap gap-3 mb-6">
                        <button class="px-4 py-2 bg-brand-burgundy text-white rounded-full hover:bg-brand-coral transition-colors">Toutes (12)</button>
                        <button class="px-4 py-2 bg-white text-brand-burgundy border border-brand-burgundy rounded-full hover:bg-brand-peach transition-colors">Publiées (8)</button>
                        <button class="px-4 py-2 bg-white text-brand-burgundy border border-brand-burgundy rounded-full hover:bg-brand-peach transition-colors">Brouillons (4)</button>
                    </div>

                    <!-- Experiences Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Experience Card 1 -->
                        <div class="experience-card bg-white rounded-lg overflow-hidden shadow-md border border-gray-100">
                            <div class="relative">
                                <img src="https://www.hervecuisine.com/wp-content/uploads/2016/06/recette-tarte-aux-fraises-facile-1024x683.jpg" alt="Tarte aux fraises maison" class="w-full h-40 object-cover">
                                <div class="absolute top-2 right-2 flex space-x-2">
                                    <button class="w-8 h-8 bg-white/80 rounded-full flex items-center justify-center text-brand-burgundy hover:bg-white transition-all">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="w-8 h-8 bg-white/80 rounded-full flex items-center justify-center text-brand-burgundy hover:bg-white transition-all">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                                <div class="absolute bottom-0 left-0 bg-brand-burgundy text-white px-3 py-1 text-xs">
                                    Publié
                                </div>
                            </div>
                            <div class="p-4">
                                <h3 class="playfair text-lg font-bold text-brand-burgundy mb-2">Tarte aux fraises maison</h3>
                                <div class="flex justify-between text-sm text-brand-gray mb-3">
                                    <span><i class="far fa-calendar-alt mr-1"></i> 12 mars 2025</span>
                                </div>
                                <div class="flex flex-wrap gap-2 mb-3">
                                    <span class="bg-brand-peach text-brand-burgundy px-2 py-1 rounded-full text-xs">Pâtisserie</span>
                                </div>
                                <a href="#" class="text-brand-burgundy hover:text-brand-coral text-sm font-medium">Voir l'expérience <i class="fas fa-arrow-right ml-1"></i></a>
                            </div>
                        </div>

                        <!-- Experience Card 2 -->
                        <div class="experience-card bg-white rounded-lg overflow-hidden shadow-md border border-gray-100">
                            <div class="relative">
                                <img src="https://www.unileverfoodsolutions.be/dam/global-ufs/mcos/belgium/calcmenu/recipes/the-vegetarian-butcher/Thai_Green_Curry_1260x709px.png" alt="Curry vert thaïlandais" class="w-full h-40 object-cover">
                                <div class="absolute top-2 right-2 flex space-x-2">
                                    <button class="w-8 h-8 bg-white/80 rounded-full flex items-center justify-center text-brand-burgundy hover:bg-white transition-all">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="w-8 h-8 bg-white/80 rounded-full flex items-center justify-center text-brand-burgundy hover:bg-white transition-all">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                                <div class="absolute bottom-0 left-0 bg-brand-burgundy text-white px-3 py-1 text-xs">
                                    Publié
                                </div>
                            </div>
                            <div class="p-4">
                                <h3 class="playfair text-lg font-bold text-brand-burgundy mb-2">Curry vert thaïlandais</h3>
                                <div class="flex justify-between text-sm text-brand-gray mb-3">
                                    <span><i class="far fa-calendar-alt mr-1"></i> 28 février 2025</span>
                                </div>
                                <div class="flex flex-wrap gap-2 mb-3">
                                    <span class="bg-brand-peach text-brand-burgundy px-2 py-1 rounded-full text-xs">Cuisine asiatique</span>
                                </div>
                                <a href="#" class="text-brand-burgundy hover:text-brand-coral text-sm font-medium">Voir l'expérience <i class="fas fa-arrow-right ml-1"></i></a>
                            </div>
                        </div>

                        <!-- Experience Card 3 -->
                        <div class="experience-card bg-white rounded-lg overflow-hidden shadow-md border border-gray-100">
                            <div class="relative">
                                <img src="https://img.passeportsante.net/1200x675/2021-03-29/i101004-.webp" alt="Risotto aux champignons" class="w-full h-40 object-cover">
                                <div class="absolute top-2 right-2 flex space-x-2">
                                    <button class="w-8 h-8 bg-white/80 rounded-full flex items-center justify-center text-brand-burgundy hover:bg-white transition-all">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="w-8 h-8 bg-white/80 rounded-full flex items-center justify-center text-brand-burgundy hover:bg-white transition-all">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                                <div class="absolute bottom-0 left-0 bg-gray-600 text-white px-3 py-1 text-xs">
                                    Brouillon
                                </div>
                            </div>
                            <div class="p-4">
                                <h3 class="playfair text-lg font-bold text-brand-burgundy mb-2">Risotto aux champignons</h3>
                                <div class="flex justify-between text-sm text-brand-gray mb-3">
                                    <span><i class="far fa-calendar-alt mr-1"></i> 5 mars 2025</span>
                                </div>
                                <div class="flex flex-wrap gap-2 mb-3">
                                    <span class="bg-brand-peach text-brand-burgundy px-2 py-1 rounded-full text-xs">Italien</span>
                                </div>
                                <a href="#" class="text-brand-burgundy hover:text-brand-coral text-sm font-medium">Éditer le brouillon <i class="fas fa-pencil-alt ml-1"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Pagination -->
                    <div class="flex justify-center mt-8">
                        <nav class="flex items-center space-x-1">
                            <a href="#" class="px-3 py-1 rounded border border-gray-300 text-brand-gray hover:bg-brand-peach hover:text-brand-burgundy transition-colors">
                                <i class="fas fa-chevron-left"></i>
                            </a>
                            <a href="#" class="px-3 py-1 rounded border border-gray-300 bg-brand-burgundy text-white">1</a>
                            <a href="#" class="px-3 py-1 rounded border border-gray-300 text-brand-gray hover:bg-brand-peach hover:text-brand-burgundy transition-colors">2</a>
                            <a href="#" class="px-3 py-1 rounded border border-gray-300 text-brand-gray hover:bg-brand-peach hover:text-brand-burgundy transition-colors">3</a>
                            <span class="px-3 py-1 text-brand-gray">...</span>
                            <a href="#" class="px-3 py-1 rounded border border-gray-300 text-brand-gray hover:bg-brand-peach hover:text-brand-burgundy transition-colors">4</a>
                            <a href="#" class="px-3 py-1 rounded border border-gray-300 text-brand-gray hover:bg-brand-peach hover:text-brand-burgundy transition-colors">
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        </nav>
                    </div>
                </section>

                <!-- Statistics Section -->
                <section id="stats-section" class="bg-white rounded-lg shadow-xl p-6 mb-8 hidden">
                    <h2 class="playfair text-2xl font-bold text-brand-burgundy mb-6">Statistiques Personnelles</h2>

                    <!-- Stats Overview -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
                        <div class="bg-brand-peach p-4 rounded-lg">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-brand-dark text-sm">Expériences</p>
                                    <p class="text-3xl font-bold text-brand-burgundy">12</p>
                                </div>
                                <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center text-brand-burgundy">
                                    <i class="fas fa-utensils text-xl"></i>
                                </div>
                            </div>
                        </div>
                        <div class="bg-brand-peach p-4 rounded-lg">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-brand-dark text-sm">Commentaires</p>
                                    <p class="text-3xl font-bold text-brand-burgundy">47</p>
                                </div>
                                <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center text-brand-burgundy">
                                    <i class="fas fa-comment-alt text-xl"></i>
                                </div>
                            </div>
                        </div>
                        <div class="bg-brand-peach p-4 rounded-lg">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-brand-dark text-sm">Favoris</p>
                                    <p class="text-3xl font-bold text-brand-burgundy">23</p>
                                </div>
                                <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center text-brand-burgundy">
                                    <i class="fas fa-heart text-xl"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Most Popular Experiences -->
                    <div class="mb-8">
                        <h3 class="playfair text-xl font-semibold text-brand-burgundy mb-4">Expériences les plus populaires</h3>
                        <div class="overflow-x-auto">
                            <table class="min-w-full border-collapse">
                                <thead>
                                    <tr class="bg-brand-peach">
                                        <th class="px-4 py-3 text-left text-sm font-medium text-brand-burgundy">Titre</th>
                                        <th class="px-4 py-3 text-center text-sm font-medium text-brand-burgundy">Commentaires</th>
                                        <th class="px-4 py-3 text-right text-sm font-medium text-brand-burgundy">Date</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    <tr class="hover:bg-brand-peach/20 transition-colors">
                                        <td class="px-4 py-3 text-sm text-brand-dark">Tarte aux fraises maison</td>
                                        <td class="px-4 py-3 text-sm text-center text-brand-dark">12</td>
                                        <td class="px-4 py-3 text-sm text-right text-brand-dark">12 mars 2025</td>
                                    </tr>
                                    <tr class="hover:bg-brand-peach/20 transition-colors">
                                        <td class="px-4 py-3 text-sm text-brand-dark">Curry vert thaïlandais</td>
                                        <td class="px-4 py-3 text-sm text-center text-brand-dark">9</td>
                                        <td class="px-4 py-3 text-sm text-right text-brand-dark">28 février 2025</td>
                                    </tr>
                                    <tr class="hover:bg-brand-peach/20 transition-colors">
                                        <td class="px-4 py-3 text-sm text-brand-dark">Gâteau au chocolat sans gluten</td>
                                        <td class="px-4 py-3 text-sm text-center text-brand-dark">7</td>
                                        <td class="px-4 py-3 text-sm text-right text-brand-dark">15 janvier 2025</td>
                                    </tr>
                                    <tr class="hover:bg-brand-peach/20 transition-colors">
                                        <td class="px-4 py-3 text-sm text-brand-dark">Salade César revisitée</td>
                                        <td class="px-4 py-3 text-sm text-center text-brand-dark">5</td>
                                        <td class="px-4 py-3 text-sm text-right text-brand-dark">5 février 2025</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>

                <!-- Settings Section -->
                <section id="settings-section" class="bg-white rounded-lg shadow-xl p-6 mb-8 hidden">
                    <h2 class="playfair text-2xl font-bold text-brand-burgundy mb-6">Paramètres du compte</h2>

                    <!-- Security Settings -->
                    <div>
                        <h3 class="playfair text-xl font-semibold text-brand-burgundy mb-4">Sécurité</h3>
                        <div class="space-y-6">
                            <div>
                                <h4 class="font-medium text-brand-dark mb-3">Changer de mot de passe</h4>
                                <form class="space-y-4">
                                    <div>
                                        <label class="block text-brand-gray text-sm mb-1" for="current-password">Mot de passe actuel</label>
                                        <input type="password" id="current-password" placeholder="••••••••" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-brand-burgundy">
                                    </div>
                                    <div>
                                        <label class="block text-brand-gray text-sm mb-1" for="new-password">Nouveau mot de passe</label>
                                        <input type="password" id="new-password" placeholder="••••••••" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-brand-burgundy">
                                    </div>
                                    <div>
                                        <label class="block text-brand-gray text-sm mb-1" for="confirm-password">Confirmer le mot de passe</label>
                                        <input type="password" id="confirm-password" placeholder="••••••••" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-brand-burgundy">
                                    </div>
                                    <button type="submit" class="px-4 py-2 bg-brand-burgundy text-white rounded hover:bg-brand-coral transition-colors">Mettre à jour le mot de passe</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
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

        // Form submission handler
        document.getElementById('edit-profile').addEventListener('submit', function(e) {
            e.preventDefault();
            // Here you would typically handle the form submission via AJAX
            // For demo purposes, we'll just toggle back to view mode
            document.getElementById('edit-profile').classList.add('hidden');
            document.getElementById('view-profile').classList.remove('hidden');

            // Show success message
            const successMessage = document.createElement('div');
            successMessage.className = 'fixed top-20 right-4 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded shadow-md';
            successMessage.innerHTML = '<div class="flex items-center"><i class="fas fa-check-circle mr-2"></i> Vos informations ont été mises à jour avec succès !</div>';
            document.body.appendChild(successMessage);

            // Remove the message after 3 seconds
            setTimeout(() => {
                successMessage.remove();
            }, 3000);
        });
    </script>
</body>

</html>