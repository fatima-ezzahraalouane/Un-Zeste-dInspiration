<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Un Zeste d'Inspiration - Inscription</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="http://parsleyjs.org/dist/parsley.js"></script>

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

        .form-container {
            background: rgba(255, 240, 237, 0.95);
            backdrop-filter: blur(10px);
        }
    </style>
</head>
<body class="poppins bg-brand-peach">
    <!-- Navbar -->
    <nav class="fixed w-full bg-white/90 backdrop-blur-md shadow-sm z-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center h-20">
                <a href="#" class="flex items-center space-x-2">
                    <img src="logo.png" alt="Logo" class="h-18 w-20">
                    <span class="playfair text-2xl font-bold text-brand-burgundy">
                        Un Zeste d'Inspiration
                    </span>
                </a>
            </div>
        </div>
    </nav>

    <!-- Signup Section -->
    <section class="min-h-screen flex items-center justify-center">
        <div class="mt-28 mb-8 form-container rounded-2xl shadow-2xl p-8 max-w-md w-full mx-4">
            <div class="text-center mb-6">
                <h2 class="playfair text-3xl font-bold text-brand-burgundy mb-2">Inscription</h2>
                <p class="text-brand-gray">Créez votre compte et rejoignez notre communauté culinaire.</p>
            </div>
            <form class="space-y-6">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-brand-gray mb-2">Prénom</label>
                        <input type="text" 
                               class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-brand-burgundy focus:ring-2 focus:ring-brand-burgundy/20"
                               placeholder="Votre prénom">
                    </div>
                    <div>
                        <label class="block text-brand-gray mb-2">Nom</label>
                        <input type="text" 
                               class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-brand-burgundy focus:ring-2 focus:ring-brand-burgundy/20"
                               placeholder="Votre nom">
                    </div>
                </div>
                <div>
                    <label class="block text-brand-gray mb-2">Email</label>
                    <input type="email" 
                           class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-brand-burgundy focus:ring-2 focus:ring-brand-burgundy/20"
                           placeholder="Votre adresse e-mail">
                </div>
                <div>
                    <label class="block text-brand-gray mb-2">Mot de passe</label>
                    <input type="password" 
                           class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-brand-burgundy focus:ring-2 focus:ring-brand-burgundy/20"
                           placeholder="Votre mot de passe">
                </div>
                <div>
                    <label class="block text-brand-gray mb-2">Confirmer le mot de passe</label>
                    <input type="password" 
                           class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-brand-burgundy focus:ring-2 focus:ring-brand-burgundy/20"
                           placeholder="Confirmez votre mot de passe">
                </div>
                <div>
                    <label class="block text-brand-gray mb-2">Rôle</label>
                    <select class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-brand-burgundy focus:ring-2 focus:ring-brand-burgundy/20">
                        <option value="Client">Client</option>
                        <option value="Chef">Chef de Cuisine</option>
                    </select>
                </div>
                <button type="submit" 
                        class="w-full bg-brand-burgundy text-white py-3 rounded-lg hover:bg-brand-red transition-colors">
                    S'inscrire
                </button>
            </form>
            <div class="mt-6 text-center">
                <p class="text-brand-gray">Déjà membre ?</p>
                <a href="login.html" class="text-brand-coral hover:text-brand-red transition-colors">Se connecter</a>
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
                        Votre destination culinaire d'excellence pour découvrir et partager des recettes extraordinaires.
                    </p>
                </div>
                <div>
                    <h4 class="playfair text-xl font-semibold mb-4">Navigation</h4>
                    <ul class="space-y-2">
                        <li><a href="index.html" class="text-brand-peach hover:text-white transition-colors">Accueil</a></li>
                        <li><a href="#" class="text-brand-peach hover:text-white transition-colors">Recettes</a></li>
                        <li><a href="#" class="text-brand-peach hover:text-white transition-colors">Chefs</a></li>
                        <li><a href="#" class="text-brand-peach hover:text-white transition-colors">Blog</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="playfair text-xl font-semibold mb-4">Légal</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-brand-peach hover:text-white transition-colors">Conditions d'utilisation</a></li>
                        <li><a href="#" class="text-brand-peach hover:text-white transition-colors">Politique de confidentialité</a></li>
                        <li><a href="#" class="text-brand-peach hover:text-white transition-colors">Mentions légales</a></li>
                        <li><a href="#" class="text-brand-peach hover:text-white transition-colors">FAQ</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="playfair text-xl font-semibold mb-4">Suivez-nous</h4>
                    <div class="flex space-x-4 mb-6">
                        <a href="#" class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-white/20 transition-all">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-white/20 transition-all">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-white/20 transition-all">
                            <i class="fab fa-pinterest"></i>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-white/20 transition-all">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                    <div class="text-brand-peach">
                        <p class="mb-2">Newsletter culinaire</p>
                        <div class="flex">
                            <input type="email" placeholder="Votre email" 
                                   class="bg-white/10 rounded-l-full py-2 px-4 focus:outline-none focus:bg-white/20 transition-all flex-grow">
                            <button class="bg-white text-brand-burgundy px-6 rounded-r-full hover:bg-brand-peach transition-all">
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
</body>
</html>