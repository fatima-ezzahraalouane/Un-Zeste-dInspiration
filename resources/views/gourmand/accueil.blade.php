<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Un Zeste d'Inspiration - Accueil Client</title>
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
    @include('partials.navbarc')

    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836" alt="Cuisine de luxe"
                class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-b from-brand-burgundy/70 to-brand-red/70"></div>
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
                    <input type="search" placeholder="Recherchez une recette ..."
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
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="stat-card rounded-2xl p-8 text-center">
                    <h3 class="text-4xl font-bold text-brand-burgundy mb-2">{{ $stats['recipes'] }}</h3>
                    <p class="text-brand-gray">Total des Recettes</p>
                </div>
                <div class="stat-card rounded-2xl p-8 text-center">
                    <h3 class="text-4xl font-bold text-brand-burgundy mb-2">{{ $stats['experiences'] }}</h3>
                    <p class="text-brand-gray">Total des Expériences Culinaires</p>
                </div>
                <div class="stat-card rounded-2xl p-8 text-center">
                    <h3 class="text-4xl font-bold text-brand-burgundy mb-2">{{ $stats['chefs'] }}</h3>
                    <p class="text-brand-gray">Total des Chefs</p>
                </div>
                <div class="stat-card rounded-2xl p-8 text-center">
                    <h3 class="text-4xl font-bold text-brand-burgundy mb-2">{{ $stats['members'] }}</h3>
                    <p class="text-brand-gray">Total des Gourmands</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Top 4 Recipes -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="playfair text-4xl font-bold text-brand-burgundy text-center mb-12">
                Recettes Populaires
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach ($recipes as $index => $recipe)
                <div class="card-hover rounded-2xl overflow-hidden bg-white shadow-lg" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <div class="relative">
                        <img src="{{ $recipe->image }}" alt="{{ $recipe->title }}"
                            class="w-full h-64 object-cover">
                        <button
                            class="absolute top-4 right-4 bg-white rounded-full p-2 shadow-md toggle-favorite"
                            data-recipe-id="{{ $recipe->id }}">
                            <i class="fas fa-heart text-xl {{ in_array($recipe->id, $likedRecipes) ? 'text-brand-burgundy' : 'text-brand-gray' }}"></i>
                        </button>
                    </div>
                    <div class="p-6">
                        <h3 class="playfair text-xl font-bold text-brand-burgundy mb-2">
                            {{ $recipe->title }}
                        </h3>
                        <p class="text-brand-gray mb-4">
                            {{ \Illuminate\Support\Str::limit($recipe->description, 100) }}
                        </p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-2">
                                <img src="{{ $recipe->chef->user->avatar ?? 'https://img.freepik.com/premium-vector/chef-restaurant-avatar-cartoon-illustration_1951-375.jpg?w=360' }}" alt="Chef"
                                    class="w-8 h-8 rounded-full border-2 border-brand-coral">
                                <span class="text-sm text-brand-gray">
                                    {{ $recipe->chef ? $recipe->chef->user->first_name . ' ' . $recipe->chef->user->last_name : 'Chef inconnu' }}
                                </span>
                            </div>
                            <a href="#"
                                class="px-4 py-2 bg-brand-burgundy text-white rounded-full text-sm hover:bg-brand-red transition-colors">
                                Voir la recette
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="text-center mt-8">
                <a href="#" class="px-6 py-2 bg-brand-burgundy text-white rounded-full hover:bg-brand-red transition-colors">
                    Voir Plus
                </a>
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
    @include('partials.footerc')

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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.toggle-favorite').forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();

                    const recipeId = this.dataset.recipeId;
                    const icon = this.querySelector('i');
                    const isFavorite = icon.classList.contains('text-brand-burgundy');

                    const url = isFavorite ?
                        "{{ route('favorites.destroy') }}" :
                        "{{ route('favorites.store') }}";

                    fetch(url, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            },
                            body: JSON.stringify({
                                recipe_id: recipeId
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (isFavorite) {
                                icon.classList.remove('text-brand-burgundy');
                                icon.classList.add('text-brand-gray');

                                // ✅ Toast pour Retirer
                                Toastify({
                                    text: "Recette retirée des favoris ❌",
                                    duration: 3000,
                                    close: true,
                                    gravity: "top",
                                    position: "right",
                                    backgroundColor: "#f87171",
                                }).showToast();
                            } else {
                                icon.classList.remove('text-brand-gray');
                                icon.classList.add('text-brand-burgundy');

                                // ✅ Toast pour Ajouter
                                Toastify({
                                    text: "Recette ajoutée aux favoris ✅",
                                    duration: 3000,
                                    close: true,
                                    gravity: "top",
                                    position: "right",
                                    backgroundColor: "#34d399",
                                }).showToast();
                            }
                        })
                        .catch(error => console.error('Erreur favori:', error));
                });
            });
        });
    </script>

    <!-- Toastify CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

    <!-- Toastify JS -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>


</body>

</html>