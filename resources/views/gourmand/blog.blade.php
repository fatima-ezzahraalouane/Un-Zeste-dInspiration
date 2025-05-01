<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <title>Un Zeste d'Inspiration - Blog Culinaire</title>
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

    <!-- Hero Section -->
    <section class="relative h-[70vh] bg-cover bg-center flex items-center justify-center"
        style="background-image: url('https://images.unsplash.com/photo-1504674900247-0877df9cc836');">
        <div class="absolute inset-0 bg-gradient-to-b from-brand-burgundy/70 to-brand-red/70"></div>
        <div class="relative text-center text-white px-4 z-10 max-w-2xl mt-4">
            <h1 class="playfair text-5xl font-bold mb-4">Le Blog Culinaire</h1>
            <p class="text-lg leading-relaxed">Inspirez-vous d’histoires gourmandes, de conseils de chefs, et de
                découvertes
                savoureuses à travers notre univers culinaire.</p>
            <a href="#blog-articles"
                class="mt-6 inline-block px-6 py-3 bg-white text-brand-burgundy font-semibold rounded-full hover:bg-brand-burgundy hover:text-white transition-all duration-300 mb-2">
                Explorer les thèmes
            </a>
        </div>
    </section>

    <!-- Blog Home Section -->
    <section id="blog-articles" class="py-12 bg-white mt-[-4rem] z-20 relative">
        <div class="max-w-7xl mx-auto px-6">
            <h1 class="text-4xl playfair font-bold text-brand-burgundy text-center mb-10">Thèmes Culinaires</h1>
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-8">
                @forelse($themes as $theme)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:scale-105 hover:shadow-2xl transition-all duration-300 group">
                    <img src="{{ $theme->image }}" alt="{{ $theme->name }}" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-3 text-brand-burgundy">{{ $theme->name }}</h3>
                        <p class="text-brand-gray mb-4">{{ Str::limit($theme->description, 80) }}</p>
                        <a href="{{ route('gourmand.experiences', ['theme' => $theme->id]) }}"
                            class="block text-center px-4 py-2 bg-brand-burgundy text-white rounded-full hover:bg-brand-red transition-colors">
                            Explorer
                        </a>
                    </div>
                </div>
                @empty
                <p class="col-span-3 text-center text-brand-gray text-lg">Aucune thème trouvée.</p>
                @endforelse
            </div>
            <!-- Pagination Controls -->
            <div class="flex justify-center mt-10 space-x-2" id="pagination-controls">
                @if ($themes->onFirstPage())
                <span class="px-4 py-2 rounded-lg bg-gray-300 text-gray-600 cursor-not-allowed">Précédent</span>
                @else
                <a href="{{ $themes->previousPageUrl() }}"
                    class="px-4 py-2 rounded-lg bg-brand-burgundy text-white hover:bg-brand-red transition-all">Précédent</a>
                @endif

                @foreach ($themes->getUrlRange(1, $themes->lastPage()) as $page => $url)
                <a href="{{ $url }}"
                    class="px-4 py-2 rounded-lg {{ $themes->currentPage() == $page ? 'bg-brand-red' : 'bg-brand-burgundy' }} text-white hover:bg-brand-red transition-all">
                    {{ $page }}
                </a>
                @endforeach

                @if ($themes->hasMorePages())
                <a href="{{ $themes->nextPageUrl() }}"
                    class="px-4 py-2 rounded-lg bg-brand-burgundy text-white hover:bg-brand-red transition-all">Suivant</a>
                @else
                <span class="px-4 py-2 rounded-lg bg-gray-300 text-gray-600 cursor-not-allowed">Suivant</span>
                @endif
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

        // Toggle mobile menu
        document.getElementById('burger-menu').addEventListener('click', () => {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</body>

</html>