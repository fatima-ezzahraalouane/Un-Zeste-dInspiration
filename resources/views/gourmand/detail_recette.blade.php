<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de la Recette - Un Zeste d'Inspiration</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
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

    <!-- Recipe Details Section -->
    <section class="py-12 bg-white shadow-lg rounded-lg">
        <div class="max-w-7xl mx-auto px-6">
            <h1 class="text-5xl playfair font-bold text-brand-burgundy mt-14 mb-6">Soupe Harira Marocaine
            </h1>
            <div class="flex flex-wrap items-center mb-6">
                <span class="bg-brand-coral text-white text-sm px-3 py-1 rounded-full mr-4">Catégorie</span>
                <div class="flex flex-wrap space-x-2">
                    <span class="bg-gray-100 text-gray-600 text-sm px-3 py-1 rounded-full">#Tag1</span>
                    <span class="bg-gray-100 text-gray-600 text-sm px-3 py-1 rounded-full">#Tag2</span>
                </div>
            </div>
            <img src="https://elhdagafood.ma/wp-content/uploads/2022/04/Harira-Bidaouia.jpg" alt="Recette"
                class="w-full h-96 object-cover rounded-lg mb-6 shadow-xl">
            <div class="relative p-8 bg-gradient-to-br from-brand-peach to-white shadow-2xl rounded-2xl">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <h2 class="text-2xl playfair font-bold text-brand-burgundy mb-3">Temps de Préparation et de
                            Cuisson
                        </h2>
                        <p class="text-brand-gray"><i class="fas fa-clock mr-2"></i> Préparation: 20 min</p>
                        <p class="text-brand-gray"><i class="fas fa-clock mr-2"></i> Cuisson: 30 min</p>
                    </div>
                    <div>
                        <h2 class="text-2xl playfair font-bold text-brand-burgundy mb-3">Description</h2>
                        <p class="text-brand-gray">Une description détaillée de la recette, soulignant les saveurs et
                            les
                            techniques utilisées.</p>
                    </div>
                </div>
                <!-- Bouton Imprimer en haut à droite -->
                <div class="flex justify-center md:absolute md:top-4 md:right-4 z-10">
                    <button onclick="printIngredientsAndInstructions()"
                        class="px-6 py-2 w-full md:w-auto bg-gradient-to-r from-brand-red to-brand-burgundy text-white rounded-full shadow-lg hover:scale-105 transition-all duration-300 flex items-center justify-center">
                        <i class="fas fa-print mr-2"></i> Imprimer
                    </button>
                </div>

                <!-- Contenu principal : Ingrédients & Instructions -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-12 mt-10">
                    <!-- Ingrédients -->
                    <div
                        class="bg-white bg-opacity-70 backdrop-blur-md shadow-lg p-6 rounded-xl hover:shadow-2xl transition-all duration-300">
                        <h2 class="text-2xl font-bold text-brand-burgundy mb-4">🛒 Ingrédients</h2>
                        <ul id="ingredients-list" class="list-disc list-inside text-brand-dark space-y-2">
                            <li>500g de viande (bœuf ou agneau) en dés</li>
                            <li>2 oignons hachés</li>
                            <li>2 tomates pelées et mixées</li>
                            <li>2 branches de céleri hachées</li>
                            <li>150g de lentilles</li>
                            <li>100g de pois chiches trempés</li>
                            <li>2 c. à soupe de concentré de tomate</li>
                            <li>2 c. à soupe de farine (diluée dans l’eau)</li>
                            <li>1/2 tasse de vermicelles ou de riz</li>
                            <li><strong>Épices :</strong> sel, poivre, curcuma, gingembre, cannelle</li>
                        </ul>
                    </div>

                    <!-- Instructions -->
                    <div
                        class="bg-white bg-opacity-70 backdrop-blur-md shadow-lg p-6 rounded-xl hover:shadow-2xl transition-all duration-300">
                        <h2 class="text-2xl font-bold text-brand-burgundy mb-4">📜 Instructions</h2>
                        <ol id="instructions-list" class="list-decimal list-inside text-brand-dark space-y-2">
                            <li>Faire revenir la viande avec l’oignon</li>
                            <li>Ajouter les épices, tomates et concentré. Faire revenir 5 min</li>
                            <li>Ajouter l’eau et le céleri. Cuire 1h à feu doux</li>
                            <li>Ajouter pois chiches, lentilles et cuire 30 min</li>
                            <li>Verser la farine diluée et ajouter vermicelles/riz</li>
                            <li>Cuire encore 10 min et servir chaud.</li>
                        </ol>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Comments Section -->
    <section class="py-12 bg-brand-peach">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-3xl playfair font-bold text-brand-burgundy mb-6">Commentaires</h2>
            <div class="mb-6">
                <textarea id="new-comment" rows="4"
                    class="w-full px-4 py-2 rounded-lg border border-brand-gray focus:outline-none focus:ring-2 focus:ring-brand-burgundy/50"
                    placeholder="Ajouter un commentaire..."></textarea>
                <button onclick="addComment()"
                    class="mt-4 px-6 py-2 bg-brand-burgundy text-white rounded-full hover:shadow-lg transform hover:scale-105 transition-all duration-300">Ajouter
                    Commentaire</button>
            </div>
            <div id="comments-section">
                <!-- Comments will be dynamically added here -->
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

        // Fonction pour imprimer les ingrédients
        function printIngredientsAndInstructions() {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();

            doc.setFont("helvetica", "bold");
            doc.text("🍽️ Recette : Harira Marocaine", 10, 10);

            // Récupérer les ingrédients
            const ingredients = document.querySelectorAll("#ingredients-list li");
            doc.setFont("helvetica", "normal");
            doc.text("🛒 Ingrédients:", 10, 20);
            ingredients.forEach((item, index) => {
                doc.text(`${index + 1}. ${item.textContent}`, 10, 30 + index * 10);
            });

            // Récupérer les instructions
            const instructions = document.querySelectorAll("#instructions-list li");
            doc.text("📜 Instructions:", 100, 20);
            instructions.forEach((item, index) => {
                doc.text(`${index + 1}. ${item.textContent}`, 100, 30 + index * 10);
            });

            // Télécharger le fichier PDF
            doc.save('recette_harira.pdf');
        }


        // Fonction pour ajouter un commentaire avec nom et photo de profil
        function addComment() {
            const commentText = document.getElementById('new-comment').value;
            const userName = "Utilisateur"; // Remplacer par le nom de l'utilisateur
            const userImage = "https://i.pravatar.cc/40"; // Remplacer par l'URL de l'image de profil de l'utilisateur

            if (commentText.trim() === "") return;

            const commentSection = document.getElementById('comments-section');
            const commentDiv = document.createElement('div');
            commentDiv.className = "bg-white rounded-lg shadow-md p-4 mb-4";
            commentDiv.innerHTML = `
                <div class="flex items-center mb-2">
                    <img src="${userImage}" alt="${userName}" class="w-10 h-10 rounded-full mr-3">
                    <span class="text-brand-burgundy font-semibold">${userName}</span>
                </div>
                <p class="text-brand-gray mb-2">${commentText}</p>
                <button class="text-brand-red text-sm mr-2" onclick="editComment(this)">Modifier</button>
                <button class="text-brand-red text-sm" onclick="deleteComment(this)">Supprimer</button>
            `;
            commentSection.appendChild(commentDiv);
            document.getElementById('new-comment').value = '';
        }

        // Fonction pour modifier un commentaire
        function editComment(button) {
            const commentDiv = button.parentNode;
            const commentText = commentDiv.querySelector('p').innerText;
            const newText = prompt("Modifier le commentaire:", commentText);
            if (newText !== null && newText.trim() !== "") {
                commentDiv.querySelector('p').innerText = newText;
            }
        }

        // Fonction pour supprimer un commentaire
        function deleteComment(button) {
            const commentDiv = button.parentNode;
            commentDiv.remove();
        }

        // Carousel functionality
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