<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <title>Un Zeste d'Inspiration - Explorer les Recettes</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

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
            bottom: 112px;
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
            <h1 class="playfair text-5xl font-bold mb-4">Explorez les Saveurs du Monde</h1>
            <p class="text-lg leading-relaxed">Découvrez une collection exquise de recettes, des plats traditionnels
                aux créations modernes.</p>
            <a href="#recette"
                class="mt-6 inline-block px-6 py-3 bg-white text-brand-burgundy font-semibold rounded-full hover:bg-brand-burgundy hover:text-white transition-all duration-300">
                Découvrir les Recettes
            </a>
        </div>
    </section>

    <!-- Recipes List Section -->
    <section id="recette" class="py-12 bg-white rounded-lg">
        <div class="max-w-7xl mx-auto px-6">
            <h1 class="text-4xl playfair font-bold text-brand-burgundy text-center mb-10">Explorer les Recettes</h1>

            @if (session('success'))
            <div id="success-alert" class="flex justify-end">
                <div class="mt-2 fixed top-20 right-4 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded shadow-md">
                    <i class="fas fa-check-circle"></i>
                    {{ session('success') }}
                </div>
            </div>
            @endif

            <!-- Search Bar + Pagination + Add Recipe Button -->
            <form method="GET" action="{{ route('gourmand.recettes') }}" class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 p-4 md:p-6 bg-gray-100 shadow-md rounded-lg gap-4">
                <!-- Search Bar -->
                <div class="relative w-full md:w-2/5">
                    <div class="flex flex-col sm:flex-row w-full gap-2">
                        <div class="relative flex-grow">
                            <i class="fas fa-search absolute left-4 top-3 text-brand-gray"></i>
                            <input type="text" name="title" value="{{ request('title') }}" placeholder="Rechercher une recette..."
                                class="w-full pl-10 pr-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-brand-burgundy transition-all shadow-sm">
                        </div>
                        <button type="submit"
                            class="px-4 py-3 bg-brand-burgundy text-white rounded-lg hover:bg-brand-red transition-all shadow-md">
                            Rechercher
                        </button>
                    </div>
                </div>

                <!-- Filters -->
                <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4 w-full md:w-auto">
                    <!-- Category Selector -->
                    <div class="flex items-center gap-2 w-full sm:w-auto">
                        <label for="recipeCategory" class="text-brand-dark font-medium whitespace-nowrap">Catégorie :</label>
                        <select name="category_id" id="recipeCategory"
                            class="px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-brand-burgundy shadow-sm transition-all flex-grow">
                            <option value="all">Toutes</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Tags Selector -->
                    <div class="flex items-center gap-2 w-full sm:w-auto">
                        <label for="recipeTags" class="text-brand-dark font-medium whitespace-nowrap">Tags :</label>
                        <select name="tag_id" id="recipeTags"
                            class="px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-brand-burgundy shadow-sm transition-all flex-grow">
                            <option value="all">Tous</option>
                            @foreach($tags as $tag)
                            <option value="{{ $tag->id }}" {{ request('tag_id') == $tag->id ? 'selected' : '' }}>
                                {{ $tag->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Pagination Selector -->
                    <div class="flex items-center gap-2 w-full sm:w-auto">
                        <label for="recipePagination" class="text-brand-dark font-medium whitespace-nowrap">Afficher :</label>
                        <select name="per_page" id="recipePagination"
                            class="px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-brand-burgundy shadow-sm transition-all flex-grow">
                            <option value="5" {{ request('per_page') == 5 ? 'selected' : '' }}>5 par page</option>
                            <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10 par page</option>
                            <option value="15" {{ request('per_page') == 15 ? 'selected' : '' }}>15 par page</option>
                        </select>
                    </div>
                </div>
            </form>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="recipes-grid">
                @forelse($recipes as $recipe)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <div class="relative">
                        <img src="{{ $recipe->image ?? 'https://via.placeholder.com/400x300' }}"
                            class="w-full h-64 object-cover transition-transform duration-300 group-hover:scale-105" alt="{{ $recipe->title }}">
                        @if(in_array($recipe->id, $likedRecipes))
                        <!-- Formulaire de suppression -->
                        <form method="POST" action="{{ route('favorites.destroy') }}"
                            class="absolute top-4 right-4 bg-white rounded-full p-2 shadow-md">
                            @csrf
                            <input type="hidden" name="recipe_id" value="{{ $recipe->id }}">
                            <button type="submit" title="Retirer des favoris">
                                <i class="fas fa-heart text-xl text-brand-burgundy"></i>
                            </button>
                        </form>
                        @else
                        <!-- Formulaire d'ajout -->
                        <form method="POST" action="{{ route('favorites.store') }}"
                            class="absolute top-4 right-4 bg-white rounded-full p-2 shadow-md">
                            @csrf
                            <input type="hidden" name="recipe_id" value="{{ $recipe->id }}">
                            <button type="submit" title="Ajouter aux favoris">
                                <i class="fas fa-heart text-xl text-brand-gray"></i>
                            </button>
                        </form>
                        @endif
                    </div>
                    <div class="p-6">
                        <div class="flex items-center space-x-2 mb-3">
                            <span class="bg-brand-coral text-white text-sm px-3 py-1 rounded-full">{{ $recipe->category->name ?? 'Sans catégorie' }}</span>
                            <span class="bg-gray-100 text-gray-600 text-sm px-3 py-1 rounded-full flex items-center">
                                <i class="fas fa-clock mr-1"></i> {{ $recipe->preparation_time + $recipe->cooking_time }} min
                            </span>
                        </div>
                        <h3 class="text-xl font-semibold mb-3 text-brand-burgundy">{{ $recipe->title }}</h3>
                        <p class="text-brand-gray mb-4">{{ Str::limit($recipe->description, 50) }}</p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-2">
                                <img src="{{ $recipe->chef->user->avatar ?? 'https://img.freepik.com/premium-vector/vector-chef-character-design_746655-2375.jpg?w=740' }}" alt="Chef"
                                    class="w-8 h-8 rounded-full border-2 border-brand-coral">
                                <span class="text-sm text-brand-gray">
                                    Par {{ $recipe->chef->user->last_name ?? 'Chef' }} {{ $recipe->chef->user->first_name ?? '' }}
                                </span>
                            </div>
                            <a href="{{ route('gourmand.recettes.show', $recipe->id) }}" class="rounded-lg bg-brand-burgundy text-white px-4 py-2 text-sm font-medium hover:bg-brand-red flex items-center">
                                <i class="fas fa-eye mr-2"></i> Voir la recette
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                <p class="col-span-3 text-center text-brand-gray text-lg">Aucune recette trouvée.</p>
                @endforelse
            </div>

            <!-- Pagination Controls -->
            @if ($recipes->count())
            <div class="flex justify-center mt-10 space-x-2" id="pagination-controls">
                @if ($recipes->onFirstPage())
                <span
                    class="px-4 py-2 rounded-lg bg-gray-300 text-gray-600 transition-all cursor-not-allowed">Précédent</span>
                @else
                <a href="{{ $recipes->previousPageUrl() }}"
                    class="px-4 py-2 rounded-lg bg-brand-burgundy text-white hover:bg-brand-red transition-all">Précédent</a>
                @endif

                @foreach ($recipes->getUrlRange(1, $recipes->lastPage()) as $page => $url)
                <a href="{{ $url }}"
                    class="px-4 py-2 rounded-lg {{ $page == $recipes->currentPage() ? 'bg-brand-red' : 'bg-brand-burgundy' }} text-white hover:bg-brand-red transition-all">{{ $page }}</a>
                @endforeach

                @if ($recipes->hasMorePages())
                <a href="{{ $recipes->nextPageUrl() }}"
                    class="px-4 py-2 rounded-lg bg-brand-burgundy text-white hover:bg-brand-red transition-all">Suivant</a>
                @else
                <span
                    class="px-4 py-2 rounded-lg bg-gray-300 text-gray-600 transition-all cursor-not-allowed">Suivant</span>
                @endif
            </div>
            @endif
        </div>
    </section>

    <!-- Carousel Section -->
    @include('components.carousel')

    <!-- Footer -->
    @include('partials.footerc')

    <!-- Scripts -->
    <script>
        // Toggle mobile menu
        document.getElementById('burger-menu').addEventListener('click', () => {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const categorySelect = document.getElementById('recipeCategory');
            const tagSelect = document.getElementById('recipeTags');
            const perPageSelect = document.getElementById('recipePagination');
            const form = categorySelect.closest('form');

            [categorySelect, tagSelect, perPageSelect].forEach(select => {
                select.addEventListener('change', function() {
                    form.submit();
                });
            });
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
</body>

</html>