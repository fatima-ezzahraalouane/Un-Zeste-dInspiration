<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <title>Un Zeste d'Inspiration - Expériences Culinaires</title>
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

        .luxury-card {
            background: linear-gradient(to bottom, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.5));
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 15px;
            overflow: hidden;
            transition: all 0.4s ease-in-out;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
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

<body class="poppins bg-brand-peach text-brand-dark">
    <!-- Navbar -->
    @include('partials.navbarc')

    <!-- Hero Section -->
    <section class="relative h-[70vh] bg-cover bg-center flex items-center justify-center"
        style="background-image: url('https://images.unsplash.com/photo-1504674900247-0877df9cc836');">
        <div class="absolute inset-0 bg-gradient-to-b from-brand-burgundy/70 to-brand-red/70"></div>
        <div class="relative text-center text-white px-4 z-10 max-w-2xl mt-4">
            <h1 class="playfair text-5xl font-bold mb-4">Explorez l'Excellence Culinaire</h1>
            <p class="text-lg leading-relaxed">Découvrez des expériences culinaires raffinées, des plats exquis et des
                histoires inspirantes de passionnés de gastronomie.</p>
            <a href="#experiences"
                class="mt-6 inline-block px-6 py-3 bg-white text-brand-burgundy font-semibold rounded-full hover:bg-brand-burgundy hover:text-white transition-all duration-300">
                Découvrir Plus</a>
        </div>
    </section>

    <!-- Culinary Experiences Section -->
    <section id="experiences" class="py-12 bg-white mt-[-4rem] z-20 relative">
        <div class="max-w-7xl mx-auto px-6">
            <h1 class="text-4xl playfair font-bold text-brand-burgundy text-center mb-10">Expériences
                en {{ $theme->name }}
            </h1>
            <!-- Search Bar + Pagination + Add Experience Button -->
            <form method="GET" action="{{ route('gourmand.experiences', ['theme' => $theme->id]) }}"
                class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 p-4 md:p-6 bg-gray-100 shadow-md rounded-lg gap-4">

                <!-- Search Bar -->
                <div class="relative w-full md:w-2/5">
                    <div class="flex flex-col sm:flex-row w-full gap-2">
                        <div class="relative flex-grow">
                            <i class="fas fa-search absolute left-4 top-3 text-brand-gray"></i>
                            <input type="text" name="title" value="{{ request('title') }}" placeholder="Rechercher une expérience..."
                                class="w-full pl-10 pr-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-brand-burgundy transition-all shadow-sm">
                        </div>
                        <button type="submit"
                            class="px-4 py-3 bg-brand-burgundy text-white rounded-lg hover:bg-brand-red transition-all shadow-md">
                            Rechercher
                        </button>
                    </div>
                </div>

                <!-- Pagination Selector + Add Button -->
                <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4 w-full md:w-auto">
                    <div class="flex items-center gap-2 w-full sm:w-auto">
                        <label for="per_page" class="text-brand-dark font-medium whitespace-nowrap">Afficher :</label>
                        <select name="per_page" id="per_page"
                            class="px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-brand-burgundy shadow-sm transition-all flex-grow"
                            onchange="this.form.submit()">
                            <option value="5" {{ request('per_page') == 5 ? 'selected' : '' }}>5 par page</option>
                            <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10 par page</option>
                            <option value="15" {{ request('per_page') == 15 ? 'selected' : '' }}>15 par page</option>
                        </select>
                    </div>

                    <!-- Add Experience Button -->
                    <button type="button" id="openModal"
                        class="w-full sm:w-auto px-6 py-3 bg-brand-burgundy text-white rounded-lg hover:bg-brand-red transition-all shadow-md">
                        <i class="fas fa-plus mr-2"></i> Ajouter une expérience
                    </button>
                </div>
            </form>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="experiences-grid">
                @forelse ($experiences as $experience)
                <div class="luxury-card">
                    <img src="{{ $experience->image }}" alt="{{ $experience->title }}"
                        class="w-full h-56 object-cover">
                    <div class="p-6">
                        <h3 class="text-2xl font-semibold text-brand-burgundy">{{ $experience->title }}</h3>
                        <p class="text-sm text-brand-gray mt-2">{{ Str::limit($experience->description, 50) }}</p>

                        <div class="flex justify-between items-center mt-4">
                            <div class="flex items-center">
                                <img src="{{ $experience->gourmand->user->avatar ?? 'https://atomic.site/wp-content/uploads/2019/02/Avatar.png' }}"
                                    alt="Gourmand"
                                    class="w-10 h-10 rounded-full border border-gray-300 shadow-sm">
                                <span class="text-brand-gray ml-3 font-large">
                                    {{ $experience->gourmand->user->first_name ?? 'Gourmand' }} {{ $experience->gourmand->user->last_name ?? 'Gourmand' }}
                                </span>
                            </div>

                            <a href="{{ route('gourmand.experiences.show', $experience->id) }}"
                                class="text-brand-gold hover:text-brand-burgundy transition-all font-semibold">
                                Lire la suite →
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                <p class="col-span-3 text-center text-brand-gray text-lg">Aucune expérience trouvée.</p>
                @endforelse
            </div>

            <!-- Pagination Controls -->
            @if ($experiences->count())
            <div class="flex justify-center mt-10 space-x-2" id="pagination-controls">
                @if ($experiences->onFirstPage())
                <button disabled
                    class="px-4 py-2 rounded-lg bg-gray-300 text-gray-600 cursor-not-allowed">Précédent</button>
                @else
                <a href="{{ $experiences->previousPageUrl() }}"
                    class="px-4 py-2 rounded-lg bg-brand-burgundy text-white hover:bg-brand-red transition-all">Précédent</a>
                @endif

                @foreach ($experiences->getUrlRange(1, $experiences->lastPage()) as $page => $url)
                <a href="{{ $url }}"
                    class="px-4 py-2 rounded-lg {{ $page == $experiences->currentPage() ? 'bg-brand-red' : 'bg-brand-burgundy' }} text-white hover:bg-brand-red transition-all">
                    {{ $page }}
                </a>
                @endforeach

                @if ($experiences->hasMorePages())
                <a href="{{ $experiences->nextPageUrl() }}"
                    class="px-4 py-2 rounded-lg bg-brand-burgundy text-white hover:bg-brand-red transition-all">Suivant</a>
                @else
                <button disabled
                    class="px-4 py-2 rounded-lg bg-gray-300 text-gray-600 cursor-not-allowed">Suivant</button>
                @endif
            </div>
            @endif
        </div>
    </section>

    <!-- Carousel Section -->
    @include('components.carousel-exp')

    <!-- Footer -->
    @include('partials.footerc')

    <!-- Modal -->
    <div id="experienceModal"
        class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center p-4 hidden z-50">
        <div class="bg-white p-4 sm:p-8 rounded-lg shadow-lg w-full max-w-lg mx-auto">
            <h2 class="text-xl sm:text-2xl font-bold text-brand-burgundy mb-4">Ajouter une Expérience</h2>

            <form method="POST" action="{{ route('experiences.store') }}">
                @csrf

                <!-- Title -->
                <label class="block text-sm font-semibold text-gray-700 mb-1">Titre</label>
                <input type="text" name="title" required placeholder="Nom de l'expérience"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-brand-burgundy mb-3">

                <!-- Description -->
                <label class="block text-sm font-semibold text-gray-700 mb-1">Description</label>
                <textarea name="description" required placeholder="Décrivez votre expérience..."
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-brand-burgundy mb-3"
                    rows="3"></textarea>

                <!-- Image URL -->
                <label class="block text-sm font-semibold text-gray-700 mb-1">URL de l'Image</label>
                <input type="url" name="image" required placeholder="https://example.com/image.jpg"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-brand-burgundy mb-3">

                <!-- Theme Selection -->
                <label class="block text-sm font-semibold text-gray-700 mb-1">Thème</label>
                <select name="theme_id" required
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-brand-burgundy mb-4">
                    <option value="" disabled selected>Choisissez un thème</option>
                    @foreach ($themes as $theme)
                    <option value="{{ $theme->id }}">{{ $theme->name }}</option>
                    @endforeach
                </select>

                <!-- Buttons -->
                <div class="flex flex-col sm:flex-row justify-end gap-3 sm:space-x-4">
                    <button type="button" id="closeModal"
                        class="order-2 sm:order-1 w-full sm:w-auto px-6 py-2 bg-gray-300 rounded-lg hover:bg-gray-400 transition-all">
                        Annuler
                    </button>
                    <button type="submit"
                        class="order-1 sm:order-2 w-full sm:w-auto px-6 py-2 bg-brand-burgundy text-white rounded-lg hover:bg-brand-red transition-all">
                        Ajouter
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        // Toggle mobile menu
        document.getElementById('burger-menu').addEventListener('click', () => {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });
    </script>

    <script>
        const modal = document.getElementById("experienceModal");
        const openModalBtn = document.getElementById("openModal");
        const closeModalBtn = document.getElementById("closeModal");
        const experienceForm = document.getElementById("experienceForm");

        // Open Modal
        openModalBtn.addEventListener("click", () => {
            modal.classList.remove("hidden");
        });

        // Close Modal
        closeModalBtn.addEventListener("click", () => {
            modal.classList.add("hidden");
        });

        // Close modal when clicking outside
        window.addEventListener("click", (event) => {
            if (event.target === modal) {
                modal.classList.add("hidden");
            }
        });
    </script>
</body>

</html>