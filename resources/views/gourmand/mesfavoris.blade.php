<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <title>Un Zeste d'Inspiration - Mes Favoris</title>
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
            bottom: 136px;
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
    @include('partials.navbarc')

    <!-- Favorites Section -->
    <section class="py-12 bg-white shadow-lg rounded-lg">
        <div class="max-w-7xl mx-auto px-6">
            <h1 class="text-4xl playfair font-bold text-brand-burgundy text-center mt-14 mb-8">Mes Recettes Préférées</h1>

            @if (session('success'))
            <div id="success-alert" class="flex justify-end">
                <div class="mb-2 px-4 py-3 bg-green-100 text-green-800 rounded shadow font-medium">
                    <i class="fas fa-check-circle"></i>
                    {{ session('success') }}
                </div>
            </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="favorites-grid">
                @forelse ($recipes as $recipe)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:scale-105 hover:shadow-2xl transition-all duration-300 group">
                    <img src="{{ $recipe->image }}" alt="{{ $recipe->title }}" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-3 text-brand-burgundy">{{ $recipe->title }}</h3>
                        <p class="text-brand-gray mb-4">{{ Str::limit($recipe->description, 50) }}</p>
                        <div class="flex justify-between items-center">
                            <a href="{{ route('gourmand.recettes.show', $recipe->id) }}"
                                class="block text-center px-4 py-2 bg-brand-burgundy text-white rounded-full hover:bg-brand-red transition-colors">
                                Voir la Recette
                            </a>
                            <form method="POST" action="{{ route('favorites.destroy') }}">
                                @csrf
                                <input type="hidden" name="recipe_id" value="{{ $recipe->id }}">
                                <button type="submit" class="text-brand-red text-sm hover:text-red-700">
                                    <i class="fas fa-trash-alt"></i> Supprimer
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @empty
                <p class="col-span-3 text-center text-brand-gray text-lg">Aucune recette enregistrée en favoris.</p>
                @endforelse
            </div>

            {{-- Pagination --}}
            @if ($recipes->hasPages())
            <div class="flex justify-center mt-10 space-x-2" id="pagination-controls">

                @if ($recipes->onFirstPage())
                <button disabled class="px-4 py-2 rounded-lg bg-gray-300 text-gray-600 cursor-not-allowed">Précédent</button>
                @else
                <a href="{{ $recipes->previousPageUrl() }}"
                    class="px-4 py-2 rounded-lg bg-brand-burgundy text-white hover:bg-brand-red transition-all">Précédent</a>
                @endif

                @foreach ($recipes->getUrlRange(1, $recipes->lastPage()) as $page => $url)
                <a href="{{ $url }}"
                    class="px-4 py-2 rounded-lg {{ $page == $recipes->currentPage() ? 'bg-brand-red' : 'bg-brand-burgundy' }} text-white hover:bg-brand-red transition-all">
                    {{ $page }}
                </a>
                @endforeach

                @if ($recipes->hasMorePages())
                <a href="{{ $recipes->nextPageUrl() }}"
                    class="px-4 py-2 rounded-lg bg-brand-burgundy text-white hover:bg-brand-red transition-all">Suivant</a>
                @else
                <button disabled class="px-4 py-2 rounded-lg bg-gray-300 text-gray-600 cursor-not-allowed">Suivant</button>
                @endif
            </div>
            @endif
        </div>
    </section>


    <!-- Carousel Section -->
    <div id="carousel-container"></div>

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

        // Toggle mobile menu
        document.getElementById('burger-menu').addEventListener('click', () => {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            fetch(`{{ route('gourmand.carousel') }}`)
                .then(response => response.text())
                .then(html => {
                    document.getElementById('carousel-container').innerHTML = html;
                    initCarousel();
                })
                .catch(error => console.error('Erreur chargement carousel:', error));
        });
    </script>

    <script src="{{ asset('js/carousel.js') }}"></script>

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
</body>

</html>