<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explorer les Recettes - Un Zeste d'Inspiration</title>
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

        .glass-effect {
            background: rgba(255, 255, 255, 0.3);
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(12px);
            padding: 20px;
            transition: all 0.4s ease-in-out;
        }

        .glass-effect:hover {
            transform: scale(1.05);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.25);
        }

        .input-container {
            display: flex;
            align-items: center;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 10px;
            padding: 12px;
            box-shadow: inset 0 4px 6px rgba(0, 0, 0, 0.15);
            transition: all 0.3s ease-in-out;
        }

        .input-container:hover {
            box-shadow: inset 0 6px 8px rgba(0, 0, 0, 0.2);
        }

        .input-container input,
        .input-container select {
            border: none;
            outline: none;
            background: transparent;
            flex-grow: 1;
            padding: 12px;
            font-size: 18px;
            color: #4C4C4C;
            font-weight: 500;
        }

        .input-container i {
            margin-right: 12px;
            color: #793E37;
            font-size: 20px;
        }

        .carousel-container {
            position: relative;
            max-width: 100%;
            overflow: hidden;
            border-radius: 10px;
        }

        .carousel-track {
            display: flex;
            transition: transform 5s ease-in-out;
        }

        .carousel-item {
            min-width: 100%;
            box-sizing: border-box;
            position: relative;
            padding: 10px;
        }

        .carousel-content {
            position: relative;
            bottom: 95px;
            background: rgba(0, 0, 0, 0.5);
            color: white;
            padding: 10px;
            border-radius: 0 0 10px 10px;
        }

        /* Media queries for responsiveness */
        @media (min-width: 640px) {
            .carousel-item {
                min-width: 100%;
            }
        }

        @media (min-width: 768px) {
            .carousel-item {
                min-width: 50%;
            }
        }

        @media (min-width: 1024px) {
            .carousel-item {
                min-width: 33.3333%;
            }
        }

        /* Add touch support for swiping */
        .carousel-container {
            touch-action: pan-y;
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
                    <a href="index.html" class="text-brand-dark hover:text-brand-coral transition-colors">Accueil</a>
                    <a href="recipes.html" class="text-brand-dark hover:text-brand-coral transition-colors">Recettes</a>
                    <a href="blog.html" class="text-brand-dark hover:text-brand-coral transition-colors">Blog</a>
                    <a href="favorites.html" class="text-brand-dark hover:text-brand-coral transition-colors">Mes
                        Favoris</a>
                    <a href="profile.html" class="text-brand-dark hover:text-brand-coral transition-colors">Profil</a>
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
        <div id="mobile-menu" class="hidden md:hidden bg-white shadow-md rounded-lg mt-2 mx-4">
            <div class="flex flex-col px-4 py-2 space-y-2">
                <a href="index.html" class="text-brand-dark hover:text-brand-coral transition-colors">Accueil</a>
                <a href="recipes.html" class="text-brand-dark hover:text-brand-coral transition-colors">Recettes</a>
                <a href="blog.html" class="text-brand-dark hover:text-brand-coral transition-colors">Blog</a>
                <a href="favorites.html" class="text-brand-dark hover:text-brand-coral transition-colors">Mes
                    Favoris</a>
                <a href="profile.html" class="text-brand-dark hover:text-brand-coral transition-colors">Profil</a>
                <a href="registre.html"
                    class="shine-effect px-6 py-2 bg-brand-burgundy text-white rounded-full hover:shadow-lg transform hover:scale-105 transition-all duration-300">
                    Déconnexion
                </a>
            </div>
        </div>
    </nav>

    <!-- Filters Section -->
    <section class="py-10 bg-white/60 shadow-xl rounded-lg">
        <div class="max-w-7xl mx-auto px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 items-center mt-20">
                <div class="glass-effect">
                    <label for="search" class="block text-brand-dark font-semibold text-lg mb-2">Rechercher par
                        titre:</label>
                    <div class="input-container">
                        <i class="fas fa-search"></i>
                        <input type="text" id="search" placeholder="Ex: Tarte aux fraises">
                    </div>
                </div>
                <div class="glass-effect">
                    <label for="category" class="block text-brand-dark font-semibold text-lg mb-2">Catégorie:</label>
                    <div class="input-container">
                        <i class="fas fa-layer-group"></i>
                        <select id="category">
                            <option value="all">Toutes</option>
                            <option value="entree">Entrée</option>
                            <option value="plat">Plat Principal</option>
                            <option value="dessert">Dessert</option>
                        </select>
                    </div>
                </div>
                <div class="glass-effect">
                    <label for="tags" class="block text-brand-dark font-semibold text-lg mb-2">Tags:</label>
                    <div class="input-container">
                        <i class="fas fa-tags"></i>
                        <select id="tags">
                            <option value="all">Tous</option>
                            <option value="vegan">Vegan</option>
                            <option value="gluten-free">Sans Gluten</option>
                            <option value="quick">Rapide</option>
                        </select>
                    </div>
                </div>
                <div class="glass-effect">
                    <label for="pagination" class="block text-brand-dark font-semibold text-lg mb-2">Afficher par
                        page:</label>
                    <div class="input-container">
                        <i class="fas fa-file-alt"></i>
                        <select id="pagination">
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="15">15</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Recipes List Section -->
    <section class="py-8 bg-brand-peach">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="recipes-grid">
                <!-- Example Recipe Card -->
                <div
                    class="bg-white rounded-lg shadow-lg overflow-hidden hover:scale-105 hover:shadow-2xl transition-all duration-300 group">
                    <div class="relative">
                        <img src="https://i0.wp.com/mesbrouillonsdecuisine.fr/wp-content/uploads/2022/06/IMG_1978.jpg?resize=1080%2C1512&ssl=1"
                            class="w-full h-64 object-cover transition-transform duration-300 group-hover:scale-105"
                            alt="Recette">
                        <div class="absolute top-4 right-4 bg-white rounded-full p-2 shadow-md">
                            <i class="fas fa-heart text-brand-burgundy text-xl"></i>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center space-x-2 mb-3">
                            <span class="bg-brand-coral text-white text-sm px-3 py-1 rounded-full">Entrée</span>
                            <span class="bg-gray-100 text-gray-600 text-sm px-3 py-1 rounded-full flex items-center">
                                <i class="fas fa-clock mr-1"></i> 20 min
                            </span>
                        </div>
                        <h3 class="text-xl font-semibold mb-3 text-brand-burgundy">Salade de Quinoa</h3>
                        <p class="text-brand-gray mb-4">Une salade légère et rafraîchissante de quinoa avec des légumes
                            frais.</p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-2">
                                <img src="https://i.pravatar.cc/40?img=8" class="w-8 h-8 rounded-full" alt="Auteur">
                                <span class="text-sm text-brand-gray">Par Chef Laura</span>
                            </div>
                            <button
                                class="rounded-lg bg-brand-burgundy text-white px-4 py-2 text-sm font-medium hover:bg-brand-red flex items-center">
                                <i class="fas fa-eye mr-2"></i> Voir la recette
                            </button>
                        </div>
                    </div>
                </div>
                <div
                    class="bg-white rounded-lg shadow-lg overflow-hidden hover:scale-105 hover:shadow-2xl transition-all duration-300 group">
                    <div class="relative">
                        <img src="https://i0.wp.com/mesbrouillonsdecuisine.fr/wp-content/uploads/2022/06/IMG_1978.jpg?resize=1080%2C1512&ssl=1"
                            class="w-full h-64 object-cover transition-transform duration-300 group-hover:scale-105"
                            alt="Recette">
                        <div class="absolute top-4 right-4 bg-white rounded-full p-2 shadow-md">
                            <i class="fas fa-heart text-brand-burgundy text-xl"></i>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center space-x-2 mb-3">
                            <span class="bg-brand-coral text-white text-sm px-3 py-1 rounded-full">Entrée</span>
                            <span class="bg-gray-100 text-gray-600 text-sm px-3 py-1 rounded-full flex items-center">
                                <i class="fas fa-clock mr-1"></i> 20 min
                            </span>
                        </div>
                        <h3 class="text-xl font-semibold mb-3 text-brand-burgundy">Salade de Quinoa</h3>
                        <p class="text-brand-gray mb-4">Une salade légère et rafraîchissante de quinoa avec des légumes
                            frais.</p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-2">
                                <img src="https://i.pravatar.cc/40?img=8" class="w-8 h-8 rounded-full" alt="Auteur">
                                <span class="text-sm text-brand-gray">Par Chef Laura</span>
                            </div>
                            <button
                                class="rounded-lg bg-brand-burgundy text-white px-4 py-2 text-sm font-medium hover:bg-brand-red flex items-center">
                                <i class="fas fa-eye mr-2"></i> Voir la recette
                            </button>
                        </div>
                    </div>
                </div>
                <div
                    class="bg-white rounded-lg shadow-lg overflow-hidden hover:scale-105 hover:shadow-2xl transition-all duration-300 group">
                    <div class="relative">
                        <img src="https://i0.wp.com/mesbrouillonsdecuisine.fr/wp-content/uploads/2022/06/IMG_1978.jpg?resize=1080%2C1512&ssl=1"
                            class="w-full h-64 object-cover transition-transform duration-300 group-hover:scale-105"
                            alt="Recette">
                        <div class="absolute top-4 right-4 bg-white rounded-full p-2 shadow-md">
                            <i class="fas fa-heart text-brand-burgundy text-xl"></i>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center space-x-2 mb-3">
                            <span class="bg-brand-coral text-white text-sm px-3 py-1 rounded-full">Entrée</span>
                            <span class="bg-gray-100 text-gray-600 text-sm px-3 py-1 rounded-full flex items-center">
                                <i class="fas fa-clock mr-1"></i> 20 min
                            </span>
                        </div>
                        <h3 class="text-xl font-semibold mb-3 text-brand-burgundy">Salade de Quinoa</h3>
                        <p class="text-brand-gray mb-4">Une salade légère et rafraîchissante de quinoa avec des légumes
                            frais.</p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-2">
                                <img src="https://i.pravatar.cc/40?img=8" class="w-8 h-8 rounded-full" alt="Auteur">
                                <span class="text-sm text-brand-gray">Par Chef Laura</span>
                            </div>
                            <button
                                class="rounded-lg bg-brand-burgundy text-white px-4 py-2 text-sm font-medium hover:bg-brand-red flex items-center">
                                <i class="fas fa-eye mr-2"></i> Voir la recette
                            </button>
                        </div>
                    </div>
                </div>
                <div
                    class="bg-white rounded-lg shadow-lg overflow-hidden hover:scale-105 hover:shadow-2xl transition-all duration-300 group">
                    <div class="relative">
                        <img src="https://i0.wp.com/mesbrouillonsdecuisine.fr/wp-content/uploads/2022/06/IMG_1978.jpg?resize=1080%2C1512&ssl=1"
                            class="w-full h-64 object-cover transition-transform duration-300 group-hover:scale-105"
                            alt="Recette">
                        <div class="absolute top-4 right-4 bg-white rounded-full p-2 shadow-md">
                            <i class="fas fa-heart text-brand-burgundy text-xl"></i>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center space-x-2 mb-3">
                            <span class="bg-brand-coral text-white text-sm px-3 py-1 rounded-full">Entrée</span>
                            <span class="bg-gray-100 text-gray-600 text-sm px-3 py-1 rounded-full flex items-center">
                                <i class="fas fa-clock mr-1"></i> 20 min
                            </span>
                        </div>
                        <h3 class="text-xl font-semibold mb-3 text-brand-burgundy">Salade de Quinoa</h3>
                        <p class="text-brand-gray mb-4">Une salade légère et rafraîchissante de quinoa avec des légumes
                            frais.</p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-2">
                                <img src="https://i.pravatar.cc/40?img=8" class="w-8 h-8 rounded-full" alt="Auteur">
                                <span class="text-sm text-brand-gray">Par Chef Laura</span>
                            </div>
                            <button
                                class="rounded-lg bg-brand-burgundy text-white px-4 py-2 text-sm font-medium hover:bg-brand-red flex items-center">
                                <i class="fas fa-eye mr-2"></i> Voir la recette
                            </button>
                        </div>
                    </div>
                </div>
                <div
                    class="bg-white rounded-lg shadow-lg overflow-hidden hover:scale-105 hover:shadow-2xl transition-all duration-300 group">
                    <div class="relative">
                        <img src="https://i0.wp.com/mesbrouillonsdecuisine.fr/wp-content/uploads/2022/06/IMG_1978.jpg?resize=1080%2C1512&ssl=1"
                            class="w-full h-64 object-cover transition-transform duration-300 group-hover:scale-105"
                            alt="Recette">
                        <div class="absolute top-4 right-4 bg-white rounded-full p-2 shadow-md">
                            <i class="fas fa-heart text-brand-burgundy text-xl"></i>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center space-x-2 mb-3">
                            <span class="bg-brand-coral text-white text-sm px-3 py-1 rounded-full">Entrée</span>
                            <span class="bg-gray-100 text-gray-600 text-sm px-3 py-1 rounded-full flex items-center">
                                <i class="fas fa-clock mr-1"></i> 20 min
                            </span>
                        </div>
                        <h3 class="text-xl font-semibold mb-3 text-brand-burgundy">Salade de Quinoa</h3>
                        <p class="text-brand-gray mb-4">Une salade légère et rafraîchissante de quinoa avec des légumes
                            frais.</p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-2">
                                <img src="https://i.pravatar.cc/40?img=8" class="w-8 h-8 rounded-full" alt="Auteur">
                                <span class="text-sm text-brand-gray">Par Chef Laura</span>
                            </div>
                            <button
                                class="rounded-lg bg-brand-burgundy text-white px-4 py-2 text-sm font-medium hover:bg-brand-red flex items-center">
                                <i class="fas fa-eye mr-2"></i> Voir la recette
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Repeat similar cards as needed -->
            </div>
        </div>
    </section>

    <!-- Pagination -->
    <section class="py-8 bg-brand-peach">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-center space-x-2">
                <button
                    class="px-4 py-2 bg-brand-burgundy text-white rounded-full hover:bg-brand-red transition-colors">Précédent</button>
                <button
                    class="px-4 py-2 bg-brand-burgundy text-white rounded-full hover:bg-brand-red transition-colors">1</button>
                <button
                    class="px-4 py-2 bg-brand-burgundy text-white rounded-full hover:bg-brand-red transition-colors">2</button>
                <button
                    class="px-4 py-2 bg-brand-burgundy text-white rounded-full hover:bg-brand-red transition-colors">3</button>
                <button
                    class="px-4 py-2 bg-brand-burgundy text-white rounded-full hover:bg-brand-red transition-colors">Suivant</button>
            </div>
        </div>
    </section>

    <!-- Carousel Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 relative">
            <h2 class="playfair text-4xl font-bold text-brand-burgundy text-center mb-12">Les Recettes en Vedette</h2>
            <div class="carousel-container">
                <div class="carousel-track">
                    <div class="carousel-item">
                        <img src="https://www.stefanofaita.com/wp-content/uploads/2022/04/pizzamargherita1.jpg"
                            alt="Pizza Margherita" class="w-full h-80 object-cover rounded-lg">
                        <div class="carousel-content">
                            <h3 class="text-xl font-bold">Pizza Margherita</h3>
                            <p>Une pizza italienne classique avec mozzarella et basilic.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c" alt="Salade Gourmet"
                            class="w-full h-80 object-cover rounded-lg">
                        <div class="carousel-content">
                            <h3 class="text-xl font-bold">Salade Gourmet aux Agrumes</h3>
                            <p>Un mélange frais et savoureux de fruits et légumes.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="https://images.unsplash.com/photo-1560717845-968823efbee1" alt="Saumon Grillé"
                            class="w-full h-80 object-cover rounded-lg">
                        <div class="carousel-content">
                            <h3 class="text-xl font-bold">Saumon Grillé aux Herbes</h3>
                            <p>Un plat sain et délicieux aux arômes méditerranéens.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="https://images.unsplash.com/photo-1551024506-0bccd828d307"
                            alt="Tarte aux Fruits Rouges" class="w-full h-80 object-cover rounded-lg">
                        <div class="carousel-content">
                            <h3 class="text-xl font-bold">Tarte aux Fruits Rouges</h3>
                            <p>Une tarte délicieuse garnie de fruits rouges frais.</p>
                        </div>
                    </div>
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
                        <li><a href="index.html" class="text-brand-peach hover:text-white transition-colors">Accueil</a>
                        </li>
                        <li><a href="recipes.html"
                                class="text-brand-peach hover:text-white transition-colors">Recettes</a></li>
                        <li><a href="chefs.html" class="text-brand-peach hover:text-white transition-colors">Chefs</a>
                        </li>
                        <li><a href="blog.html" class="text-brand-peach hover:text-white transition-colors">Blog</a>
                        </li>
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

        // Animation des statistiques
        function animateValue(obj, start, end, duration) {
            let startTimestamp = null;
            const step = (timestamp) => {
                if (!startTimestamp) startTimestamp = timestamp;
                const progress = Math.min((timestamp - startTimestamp) / duration, 1);
                obj.textContent = Math.floor(progress * (end - start) + start).toLocaleString();
                if (progress < 1) {
                    window.requestAnimationFrame(step);
                }
            };
            window.requestAnimationFrame(step);
        }

        // Observer pour déclencher les animations au scroll
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const el = entry.target;
                    const value = parseInt(el.dataset.value);
                    animateValue(el, 0, value, 2000);
                    observer.unobserve(el);
                }
            });
        }, {
            threshold: 0.5
        });

        // Observer les éléments avec data-value
        document.querySelectorAll('[data-value]').forEach(el => observer.observe(el));

        // Toggle mobile menu
        document.getElementById('burger-menu').addEventListener('click', () => {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });

        // Carousel functionality
        // Add this to your existing script section
        document.addEventListener('DOMContentLoaded', function () {
            // Carousel functionality
            let currentIndex = 0;
            const track = document.querySelector('.carousel-track');
            const slides = document.querySelectorAll('.carousel-item');
            const totalSlides = slides.length;
            let visibleSlides = 1; // Default for mobile

            // Determine visible slides based on screen width
            function updateVisibleSlides() {
                if (window.innerWidth >= 1024) {
                    visibleSlides = 3;
                } else if (window.innerWidth >= 768) {
                    visibleSlides = 2;
                } else {
                    visibleSlides = 1;
                }
                updateCarousel();
            }

            // Update carousel position
            function updateCarousel() {
                const maxIndex = totalSlides - visibleSlides;
                if (currentIndex > maxIndex) {
                    currentIndex = maxIndex;
                }
                if (currentIndex < 0) {
                    currentIndex = 0;
                }

                const slidePercentage = 100 / visibleSlides;
                track.style.transform = `translateX(-${currentIndex * slidePercentage}%)`;
            }

            // Auto slide functionality
            function autoSlide() {
                currentIndex = (currentIndex + 1) % (totalSlides - visibleSlides + 1);
                updateCarousel();
            }

            // Touch support for mobile swiping
            let touchStartX = 0;
            let touchEndX = 0;

            track.addEventListener('touchstart', e => {
                touchStartX = e.changedTouches[0].screenX;
            });

            track.addEventListener('touchend', e => {
                touchEndX = e.changedTouches[0].screenX;
                handleSwipe();
            });

            function handleSwipe() {
                if (touchEndX < touchStartX - 50) { // Swiped left
                    currentIndex = Math.min(totalSlides - visibleSlides, currentIndex + 1);
                    updateCarousel();
                }
                if (touchEndX > touchStartX + 50) { // Swiped right
                    currentIndex = Math.max(0, currentIndex - 1);
                    updateCarousel();
                }
            }

            // Handle window resize
            window.addEventListener('resize', updateVisibleSlides);

            // Initialize
            updateVisibleSlides();

            // Set auto slide interval - adjust timing as needed
            const slideInterval = setInterval(autoSlide, 5000);

            // Pause auto-sliding when user interacts with swipe
            track.addEventListener('touchstart', () => clearInterval(slideInterval));
        });
    </script>
</body>

</html>