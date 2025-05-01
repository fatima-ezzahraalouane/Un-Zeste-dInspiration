<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <title>Un Zeste d'Inspiration - Détails de l'Expérience</title>
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

    <!-- Experience Details Section -->
    <section class="py-12 bg-white shadow-lg rounded-lg">
        <div class="max-w-7xl mx-auto px-6">
            <h1 class="text-5xl playfair font-bold text-brand-burgundy mt-14 mb-6">{{ $experience->title }}</h1>

            <!-- Infos : Auteur - Date - Thème -->
            <div class="flex flex-wrap items-center text-sm text-brand-gray mb-6 gap-4">
                <!-- Auteur -->
                <div class="flex items-center space-x-2">
                    <i class="fas fa-user text-brand-burgundy"></i>
                    <span>Auteur : <span class="font-semibold text-brand-dark"> {{ $experience->gourmand->user->first_name ?? 'Inconnu' }} {{ $experience->gourmand->user->last_name }}</span></span>
                </div>

                <!-- Date -->
                <div class="flex items-center space-x-2">
                    <i class="fas fa-calendar-alt text-brand-burgundy"></i>
                    <span>Publié le : <span class="font-semibold text-brand-dark">{{ $experience->created_at->format('d M Y') }}</span></span>
                </div>

                <!-- Thème -->
                <div class="flex items-center space-x-2">
                    <i class="fas fa-tag text-brand-burgundy"></i>
                    <span>Thème : <span class="font-semibold text-brand-dark">{{ $experience->theme->name }}</span></span>
                </div>
            </div>

            <img src="{{ $experience->image }}" alt="Expérience Culinaire"
                class="w-full h-96 object-cover rounded-lg mb-6">
            <div class="mb-6">
                <h2 class="text-2xl playfair font-bold text-brand-burgundy mb-3">Description</h2>
                <p class="text-brand-gray"> {{ $experience->description }}</p>
            </div>
        </div>
    </section>

    <!-- Comments Section -->
    <section class="py-12 bg-brand-peach">
        <div class="max-w-7xl mx-auto px-6">

            @if (session('success'))
            <div id="success-alert" class="flex justify-end">
                <div class="mb-6 px-4 py-3 bg-green-100 text-green-800 rounded shadow font-medium flex items-center gap-2">
                    <i class="fas fa-check-circle"></i>
                    {{ session('success') }}
                </div>
            </div>
            @endif

            <h2 class="text-3xl playfair font-bold text-brand-burgundy mb-6">Commentaires</h2>

            <!-- Formulaire d'ajout -->
            <form method="POST" action="{{ route('commentaires.store') }}">
                @csrf
                <input type="hidden" name="commentable_type" value="App\Models\Experience">
                <input type="hidden" name="commentable_id" value="{{ $experience->id }}">

                <textarea name="content" rows="4"
                    class="w-full px-4 py-2 rounded-lg border border-brand-gray focus:outline-none focus:ring-2 focus:ring-brand-burgundy/50"
                    placeholder="Ajouter un commentaire...">{{ old('content') }}</textarea>

                @error('content')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror

                <button type="submit"
                    class="mt-4 px-6 py-2 bg-brand-burgundy text-white rounded-full hover:shadow-lg transform hover:scale-105 transition-all duration-300">
                    Ajouter Commentaire
                </button>
            </form>

            <!-- Liste des commentaires -->
            <div id="comments-section" class="mt-10 space-y-6">
                @foreach ($experience->comments as $comment)
                <div class="bg-white rounded-lg p-4 shadow">
                    <div class="flex items-start gap-4">
                        <!-- Avatar -->
                        <img src="{{ $comment->gourmand->user->avatar ?? 'https://atomic.site/wp-content/uploads/2019/02/Avatar.png' }}"
                            alt="Avatar Gourmand"
                            class="w-10 h-10 rounded-full border-2 border-brand-coral object-cover">

                        <div class="flex-1">
                            <!-- Nom + Date + Actions -->
                            <div class="flex justify-between items-center mb-2">
                                <div class="flex items-center gap-2">
                                    <h4 class="font-semibold text-brand-burgundy">
                                        {{ $comment->gourmand->user->first_name }} {{ $comment->gourmand->user->last_name }}
                                    </h4>
                                    <span class="text-sm text-brand-gray">
                                        {{ $comment->created_at->diffForHumans() }}
                                    </span>
                                </div>

                                @if ($comment->gourmand_id === auth()->user()->gourmand->id)
                                <div class="flex gap-3">
                                    <form method="POST" action="{{ route('commentaires.destroy', $comment->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-sm text-red-500 hover:underline">Supprimer</button>
                                    </form>
                                    <button type="button" onclick="toggleEditForm({{ $comment->id }})"
                                        class="text-sm text-brand-burgundy hover:underline">Modifier</button>
                                </div>
                                @endif
                            </div>

                            <!-- Contenu -->
                            <p class="text-brand-gray" id="comment-content-{{ $comment->id }}">{{ $comment->content }}</p>

                            <!-- Formulaire de modification -->
                            <form method="POST" action="{{ route('commentaires.update', $comment->id) }}"
                                id="edit-form-{{ $comment->id }}" class="hidden mt-3">
                                @csrf
                                @method('PUT')
                                <textarea name="content" rows="2"
                                    class="w-full px-4 py-2 border rounded-lg border-brand-gray focus:outline-none focus:ring-2 focus:ring-brand-burgundy/50 text-sm">{{ old('content', $comment->content) }}</textarea>
                                @error('content')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror

                                <div class="flex justify-end mt-2">
                                    <button type="submit"
                                        class="px-4 py-1 text-sm bg-brand-burgundy text-white rounded-full hover:bg-brand-red transition-all">
                                        Sauvegarder
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Carousel Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 relative">
            <h2 class="playfair text-4xl font-bold text-brand-burgundy text-center mb-12">Les Expériences les Plus
                Commentées</h2>
            <div class="carousel-container">
                <div class="carousel-track">
                    <div class="carousel-item">
                        <img src="https://www.stefanofaita.com/wp-content/uploads/2022/04/pizzamargherita1.jpg"
                            alt="Expérience Culinaire" class="w-full h-80 object-cover rounded-lg">
                        <div class="carousel-content">
                            <h3 class="text-xl font-bold">Titre de l'Expérience</h3>
                            <p>Une description courte de l'expérience culinaire..</p>
                            <a href="experience-details.html"
                                class="block text-center px-4 py-2 bg-brand-burgundy text-white rounded-full hover:bg-brand-red transition-colors">Lire
                                la suite</a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c" alt="Salade Gourmet"
                            class="w-full h-80 object-cover rounded-lg">
                        <div class="carousel-content">
                            <h3 class="text-xl font-bold">Salade Gourmet aux Agrumes</h3>
                            <p>Un mélange frais et savoureux de fruits et légumes.</p>
                            <a href="experience-details.html"
                                class="block text-center px-4 py-2 bg-brand-burgundy text-white rounded-full hover:bg-brand-red transition-colors">Lire
                                la suite</a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="https://images.unsplash.com/photo-1560717845-968823efbee1" alt="Saumon Grillé"
                            class="w-full h-80 object-cover rounded-lg">
                        <div class="carousel-content">
                            <h3 class="text-xl font-bold">Saumon Grillé aux Herbes</h3>
                            <p>Un plat sain et délicieux aux arômes méditerranéens.</p>
                            <a href="experience-details.html"
                                class="block text-center px-4 py-2 bg-brand-burgundy text-white rounded-full hover:bg-brand-red transition-colors">Lire
                                la suite</a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="https://images.unsplash.com/photo-1551024506-0bccd828d307"
                            alt="Tarte aux Fruits Rouges" class="w-full h-80 object-cover rounded-lg">
                        <div class="carousel-content">
                            <h3 class="text-xl font-bold">Tarte aux Fruits Rouges</h3>
                            <p>Une tarte délicieuse garnie de fruits rouges frais.</p>
                            <a href="experience-details.html"
                                class="block text-center px-4 py-2 bg-brand-burgundy text-white rounded-full hover:bg-brand-red transition-colors">Lire
                                la suite</a>
                        </div>
                    </div>
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

        // Toggle mobile menu
        document.getElementById('burger-menu').addEventListener('click', () => {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });

        // Carousel functionality
        let currentIndex = 0;
        const track = document.querySelector('.carousel-track');
        const slides = document.querySelectorAll('.carousel-item');
        const totalSlides = slides.length;
        const visibleSlides = 3;
        const slideWidth = slides[0].offsetWidth;

        function updateCarousel() {
            if (currentIndex >= totalSlides - visibleSlides + 1) {
                currentIndex = 0;
            }
            track.style.transform = `translateX(-${currentIndex * (100 / visibleSlides)}%)`;
        }

        function autoSlide() {
            currentIndex++;
            updateCarousel();
        }

        setInterval(autoSlide, 5000);
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
    <script>
        function toggleEditForm(id) {
            const form = document.getElementById(`edit-form-${id}`);
            const content = document.getElementById(`comment-content-${id}`);
            if (form.classList.contains('hidden')) {
                form.classList.remove('hidden');
                content.classList.add('hidden');
            } else {
                form.classList.add('hidden');
                content.classList.remove('hidden');
            }
        }
    </script>
</body>

</html>