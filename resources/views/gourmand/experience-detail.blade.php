<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <title>Un Zeste d'Inspiration - Détails de l'Expérience</title>
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
                <div class="mt-2 fixed top-20 right-4 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded shadow-md">
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
                @foreach ($experience->comments()->orderByDesc('created_at')->get() as $comment)
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
                                    <button type="button" onclick="toggleEditForm('{{ $comment->id }}')"
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
                                    <button type="button" onclick="toggleEditForm('{{ $comment->id }}')"
                                        class="px-4 py-1 mr-2 text-sm bg-gray-300 text-brand-dark rounded-full hover:bg-gray-400 transition-all">
                                        Annuler
                                    </button>
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
    @include('components.carousel-exp', ['experiences' => $topExperiences])

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