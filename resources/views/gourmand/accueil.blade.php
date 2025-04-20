<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Un Zeste d'Inspiration - Accueil Gourmand</title>
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

        .hero-gradient {
            background: linear-gradient(rgba(121, 62, 55, 0.8), rgba(151, 67, 68, 0.8));
        }

        .card-hover {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(121, 62, 55, 0.15);
        }

        .stat-card {
            background: rgba(255, 240, 237, 0.95);
            backdrop-filter: blur(10px);
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

        @keyframes countUp {
            from {
                content: "0";
            }
        }

        .count-up::after {
            animation: countUp 2s ease-out forwards;
        }
    </style>
</head>

<body class="poppins bg-brand-peach">
    <!-- Navbar -->
    <nav class="fixed w-full bg-white/90 backdrop-blur-md shadow-sm z-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center h-20">
                <a href="#" class="flex items-center space-x-2">
                    <img src="logo.png" alt="Logo" class="h-18 w-24">
                    <span class="playfair text-2xl font-bold text-brand-burgundy">
                        Un Zeste d'Inspiration
                    </span>
                </a>

                <div class="hidden md:flex items-center space-x-8">
                    <a href="#" class="text-brand-dark hover:text-brand-coral transition-colors">Accueil</a>
                    <a href="#" class="text-brand-dark hover:text-brand-coral transition-colors">Recettes</a>
                    <a href="#" class="text-brand-dark hover:text-brand-coral transition-colors">Blog</a>
                    <a href="#" class="text-brand-dark hover:text-brand-coral transition-colors">Mes Favoris</a>
                    <a href="#" class="text-brand-dark hover:text-brand-coral transition-colors">Profil</a>
                    <a href="registre.html"
                        class="shine-effect px-6 py-2 bg-brand-burgundy text-white rounded-full hover:shadow-lg transform hover:scale-105 transition-all duration-300">
                        Déconnexion
                    </a>
                </div>

                <button id="burger-menu" class="md:hidden text-brand-burgundy">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-white shadow-lg rounded-lg mt-2 mx-4 p-4 mb-4">
            <a href="#" class="block text-brand-dark hover:text-brand-coral transition-colors mb-2">Accueil</a>
            <a href="#" class="block text-brand-dark hover:text-brand-coral transition-colors mb-2">Recettes</a>
            <a href="#" class="block text-brand-dark hover:text-brand-coral transition-colors mb-2">Blog</a>
            <a href="#" class="block text-brand-dark hover:text-brand-coral transition-colors mb-2">Mes Favoris</a>
            <a href="#" class="block text-brand-dark hover:text-brand-coral transition-colors mb-2">Profil</a>
            <a href="#"
                class="block text-center shine-effect px-6 py-2 bg-brand-burgundy text-white rounded-full mt-4 hover:shadow-lg transform hover:scale-105 transition-all duration-300">
                Déconnexion
            </a>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836" alt="Cuisine de luxe"
                class="w-full h-full object-cover">
            <div class="absolute inset-0 hero-gradient"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 py-32 text-white">
            <div class="max-w-3xl" data-aos="fade-right">
                <h1 class="playfair text-5xl md:text-7xl font-bold mb-6">
                    Découvrez l'Art de la Cuisine
                </h1>
                <p class="text-xl mb-8 text-white/90">
                    Explorez des milliers de recettes exquises et partagez vos créations culinaires avec notre
                    communauté passionnée
                </p>

                <!-- Barre de recherche -->
                <div class="relative max-w-2xl">
                    <input type="search" placeholder="Recherchez une recette, un ingrédient..."
                        class="w-full px-8 py-4 rounded-full bg-white/95 text-brand-dark placeholder-brand-gray focus:outline-none focus:ring-2 focus:ring-brand-burgundy/50">
                    <button
                        class="absolute right-4 top-1/2 -translate-y-1/2 bg-brand-burgundy text-white p-3 rounded-full hover:bg-brand-red transition-colors">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistics Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="stat-card rounded-2xl p-8 text-center" data-aos="fade-up">
                    <h3 class="text-4xl font-bold text-brand-burgundy mb-2 count-up" data-count="1500">1500+</h3>
                    <p class="text-brand-gray">Total des Recettes</p>
                </div>
                <div class="stat-card rounded-2xl p-8 text-center" data-aos="fade-up" data-aos-delay="100">
                    <h3 class="text-4xl font-bold text-brand-burgundy mb-2 count-up" data-count="300">300+</h3>
                    <p class="text-brand-gray">Total des Expériences Culinaires</p>
                </div>
                <div class="stat-card rounded-2xl p-8 text-center" data-aos="fade-up" data-aos-delay="200">
                    <h3 class="text-4xl font-bold text-brand-burgundy mb-2 count-up" data-count="250">250+</h3>
                    <p class="text-brand-gray">Total des Chefs</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Top 4 Recipes -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="playfair text-4xl font-bold text-brand-burgundy text-center mb-12">Recettes Populaires</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Recette 1 -->
                <div class="card-hover rounded-2xl overflow-hidden bg-white shadow-lg" data-aos="fade-up">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c" alt="Salade Gourmet"
                            class="w-full h-64 object-cover">
                    </div>
                    <div class="p-6">
                        <h3 class="playfair text-xl font-bold text-brand-burgundy mb-2">
                            Salade Gourmet aux Agrumes
                        </h3>
                        <p class="text-brand-gray mb-4">
                            Une explosion de saveurs fraîches avec des agrumes de saison et une vinaigrette maison.
                        </p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-2">
                                <img src="https://i.pravatar.cc/40?img=1" alt="Chef"
                                    class="w-8 h-8 rounded-full border-2 border-brand-coral">
                                <span class="text-sm text-brand-gray">Chef Marie</span>
                            </div>
                            <button
                                class="px-4 py-2 bg-brand-burgundy text-white rounded-full text-sm hover:bg-brand-red transition-colors">
                                Voir la recette
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Recette 2 -->
                <div class="card-hover rounded-2xl overflow-hidden bg-white shadow-lg" data-aos="fade-up"
                    data-aos-delay="100">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1560717845-968823efbee1" alt="Saumon Grillé"
                            class="w-full h-64 object-cover">
                    </div>
                    <div class="p-6">
                        <h3 class="playfair text-xl font-bold text-brand-burgundy mb-2">
                            Saumon Grillé aux Herbes
                        </h3>
                        <p class="text-brand-gray mb-4">
                            Un délicieux saumon grillé accompagné d'herbes fraîches et de légumes de saison.
                        </p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-2">
                                <img src="https://i.pravatar.cc/40?img=2" alt="Chef"
                                    class="w-8 h-8 rounded-full border-2 border-brand-coral">
                                <span class="text-sm text-brand-gray">Chef Thomas</span>
                            </div>
                            <button
                                class="px-4 py-2 bg-brand-burgundy text-white rounded-full text-sm hover:bg-brand-red transition-colors">
                                Voir la recette
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Recette 3 -->
                <div class="card-hover rounded-2xl overflow-hidden bg-white shadow-lg" data-aos="fade-up"
                    data-aos-delay="200">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1551024506-0bccd828d307" alt="Dessert Gourmand"
                            class="w-full h-64 object-cover">
                    </div>
                    <div class="p-6">
                        <h3 class="playfair text-xl font-bold text-brand-burgundy mb-2">
                            Tarte aux Fruits Rouges
                        </h3>
                        <p class="text-brand-gray mb-4">
                            Une délicieuse tarte aux fruits rouges avec une crème pâtissière maison.
                        </p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-2">
                                <img src="https://i.pravatar.cc/40?img=3" alt="Chef"
                                    class="w-8 h-8 rounded-full border-2 border-brand-coral">
                                <span class="text-sm text-brand-gray">Chef Sophie</span>
                            </div>
                            <button
                                class="px-4 py-2 bg-brand-burgundy text-white rounded-full text-sm hover:bg-brand-red transition-colors">
                                Voir la recette
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Recette 4 -->
                <div class="card-hover rounded-2xl overflow-hidden bg-white shadow-lg" data-aos="fade-up"
                    data-aos-delay="300">
                    <div class="relative">
                        <img src="https://www.casa-azzurra-italia.fr/wp-content/uploads/2022/11/Tagliatelles-aux-champignons-de-paris-et-grana-padano-Casa-Azzurra.jpg"
                            alt="Pâtes aux Champignons" class="w-full h-64 object-cover">
                    </div>
                    <div class="p-6">
                        <h3 class="playfair text-xl font-bold text-brand-burgundy mb-2">
                            Pâtes aux Champignons
                        </h3>
                        <p class="text-brand-gray mb-4">
                            Des pâtes délicieuses avec une sauce crémeuse aux champignons et du parmesan.
                        </p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-2">
                                <img src="https://i.pravatar.cc/40?img=4" alt="Chef"
                                    class="w-8 h-8 rounded-full border-2 border-brand-coral">
                                <span class="text-sm text-brand-gray">Chef Pierre</span>
                            </div>
                            <button
                                class="px-4 py-2 bg-brand-burgundy text-white rounded-full text-sm hover:bg-brand-red transition-colors">
                                Voir la recette
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-8">
                <button
                    class="px-6 py-2 bg-brand-burgundy text-white rounded-full hover:bg-brand-red transition-colors">
                    Voir Plus
                </button>
            </div>
        </div>
    </section>

    <!-- Website Presentation -->
    <section class="py-20 bg-brand-peach">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="playfair text-4xl font-bold text-brand-burgundy text-center mb-12">À Propos de Nous</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div data-aos="fade-right">
                    <h3 class="text-2xl font-bold text-brand-dark mb-4">Notre Mission</h3>
                    <p class="text-brand-gray mb-6">
                        Offrir une plateforme où les passionnés de cuisine peuvent explorer, partager et découvrir des
                        recettes uniques et délicieuses.
                    </p>
                    <h3 class="text-2xl font-bold text-brand-dark mb-4">Notre Vision</h3>
                    <p class="text-brand-gray mb-6">
                        Créer une communauté culinaire mondiale où chacun peut exprimer sa créativité et trouver son
                        inspiration.
                    </p>
                </div>
                <div data-aos="fade-left">
                    <h3 class="text-2xl font-bold text-brand-dark mb-4">À propos de la Fondatrice du site</h3>
                    <p class="text-brand-gray mb-6">
                        <strong>Fatima-Ezzahra Alouane</strong> a fondé Un Zeste d'Inspiration avec la passion de la
                        cuisine. Elle offre aux personnes du monde entier la possibilité de partager leurs expériences
                        culinaires et leurs recettes, afin de rassembler les amateurs de cuisine du monde entier.
                    </p>
                    <img src="https://images.unsplash.com/photo-1551024506-0bccd828d307" alt="Chef Pierre Dupont"
                        class="w-full h-64 object-cover rounded-2xl">
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-brand-burgundy text-white py-12">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="playfair text-2xl font-bold mb-4">Un Zeste d'Inspiration</h3>
                    <p class="text-brand-peach">
                        Votre destination culinaire d'excellence pour découvrir et partager des recettes
                        extraordinaires.
                    </p>
                </div>
                <div>
                    <h4 class="playfair text-xl font-semibold mb-4">Navigation</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-brand-peach hover:text-white transition-colors">Accueil</a></li>
                        <li><a href="#" class="text-brand-peach hover:text-white transition-colors">Recettes</a></li>
                        <li><a href="#" class="text-brand-peach hover:text-white transition-colors">Chefs</a></li>
                        <li><a href="#" class="text-brand-peach hover:text-white transition-colors">Blog</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="playfair text-xl font-semibold mb-4">Légal</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-brand-peach hover:text-white transition-colors">Conditions
                                d'utilisation</a></li>
                        <li><a href="#" class="text-brand-peach hover:text-white transition-colors">Politique de
                                confidentialité</a></li>
                        <li><a href="#" class="text-brand-peach hover:text-white transition-colors">Mentions légales</a>
                        </li>
                        <li><a href="#" class="text-brand-peach hover:text-white transition-colors">FAQ</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="playfair text-xl font-semibold mb-4">Suivez-nous</h4>
                    <div class="flex space-x-4 mb-6">
                        <a href="#"
                            class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-white/20 transition-all">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-white/20 transition-all">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-white/20 transition-all">
                            <i class="fab fa-pinterest"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-white/20 transition-all">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                    <div class="text-brand-peach">
                        <p class="mb-2">Newsletter culinaire</p>
                        <div class="flex">
                            <input type="email" placeholder="Votre email"
                                class="bg-white/10 rounded-l-full py-2 px-4 focus:outline-none focus:bg-white/20 transition-all flex-grow">
                            <button
                                class="bg-white text-brand-burgundy px-6 rounded-r-full hover:bg-brand-peach transition-all">
                                <i class="fas fa-paper-plane"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Séparateur -->
            <div class="border-t border-white/10 my-12"></div>

            <!-- Footer Bottom -->
            <div class="flex justify-center items-center text-brand-peach text-sm">
                <p>&copy; 2024 Un Zeste d'Inspiration. Tous droits réservés.</p>
            </div>
    </footer>

    <!-- Scripts -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        // Initialisation des animations
        AOS.init({
            duration: 800,
            once: true,
        });

        // Animation des statistiques de comptage
        document.querySelectorAll('.count-up').forEach(stat => {
            let count = 0;
            const updateCount = () => {
                const target = +stat.getAttribute('data-count');
                const increment = target / 200;

                if (count < target) {
                    count += increment;
                    stat.textContent = Math.ceil(count) + '+';
                    setTimeout(updateCount, 10);
                } else {
                    stat.textContent = target + '+';
                }
            };
            updateCount();
        });

        // Toggle mobile menu
        document.getElementById('burger-menu').addEventListener('click', () => {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</body>

</html>