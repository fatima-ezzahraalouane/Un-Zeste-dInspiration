@extends('layouts.app')

@section('content')

<!-- Hero Section -->
<section class="relative min-h-screen flex items-center">
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836"
            alt="Cuisine de luxe"
            class="w-full h-full object-cover">
        <div class="absolute inset-0 hero-gradient"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 py-32 text-white">
        <div class="max-w-3xl">
            <h1 class="playfair text-5xl md:text-7xl font-bold mb-6">
                Découvrez l'Art de la Cuisine
            </h1>
            <p class="text-xl mb-8 text-white/90">
                Explorez des milliers de recettes exquises et partagez vos créations culinaires avec notre communauté passionnée
            </p>

            <!-- Barre de recherche -->
            <div class="relative max-w-2xl">
                <input type="search"
                    placeholder="Recherchez une recette, un ingrédient..."
                    class="w-full px-8 py-4 rounded-full bg-white/95 text-brand-dark placeholder-brand-gray focus:outline-none focus:ring-2 focus:ring-brand-burgundy/50">
                <a href="{{ route('login') }}" class="absolute right-4 top-1/2 -translate-y-1/2 bg-brand-burgundy text-white p-3 rounded-full hover:bg-brand-red transition-colors">
                    <i class="fas fa-search"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Statistiques -->
<section class="py-16 relative -mt-32">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="stat-card rounded-2xl p-8 text-center">
                <div class="text-4xl font-bold text-brand-burgundy mb-2">{{ $stats['recipes'] }}</div>
                <p class="text-brand-gray">Recettes Délicieuses</p>
            </div>
            <div class="stat-card rounded-2xl p-8 text-center">
                <div class="text-4xl font-bold text-brand-burgundy mb-2">{{ $stats['experiences'] }}</div>
                <p class="text-brand-gray">Expériences Culinaires</p>
            </div>
            <div class="stat-card rounded-2xl p-8 text-center">
                <div class="text-4xl font-bold text-brand-burgundy mb-2">{{ $stats['chefs'] }}</div>
                <p class="text-brand-gray">Chefs Passionnés</p>
            </div>
            <div class="stat-card rounded-2xl p-8 text-center">
                <div class="text-4xl font-bold text-brand-burgundy mb-2">{{ $stats['members'] }}</div>
                <p class="text-brand-gray">Membres Actifs</p>
            </div>
        </div>
    </div>
</section>

<!-- Top 3 Recettes -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="playfair text-4xl font-bold text-brand-burgundy text-center mb-12">
            Recettes les Plus Populaires
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach ($recipes as $index => $recipe)
            <div class="rounded-2xl overflow-hidden bg-white shadow-lg">
                <div class="relative">
                    <img src="{{ $recipe->image }}" alt="{{ $recipe->title }}" class="w-full h-64 object-cover">
                </div>
                <div class="p-6">
                    <h3 class="playfair text-xl font-bold text-brand-burgundy mb-2">
                        {{ $recipe->title }}
                    </h3>
                    <p class="text-brand-gray mb-4">
                        {{ Str::limit($recipe->description, 50) }}
                    </p>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-2">
                            <img src="{{ $recipe->chef->user->avatar ?? 'https://img.freepik.com/premium-vector/vector-chef-character-design_746655-2375.jpg?w=740' }}" alt="Chef"
                                class="w-8 h-8 rounded-full border-2 border-brand-coral">
                            <span class="text-sm text-brand-gray">
                                Par {{ $recipe->chef->user->last_name ?? 'Chef' }} {{ $recipe->chef->user->first_name ?? '' }}
                            </span>
                        </div>
                        <a href="{{ route('login') }}" class="rounded-lg bg-brand-burgundy text-white px-4 py-2 text-sm font-medium hover:bg-brand-red flex items-center">
                                <i class="fas fa-eye mr-2"></i> Voir la recette
                            </a>
                    </div>
                </div>
            </div>
            @endforeach



        </div>
    </div>
</section>

<!-- Website Introduction -->
<section class="py-20 bg-brand-peach">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="playfair text-4xl font-bold text-brand-burgundy text-center mb-12">
            Bienvenue à Un Zeste d'Inspiration
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div>
                <h3 class="text-2xl font-bold text-brand-dark mb-4">Notre Mission</h3>
                <p class="text-brand-gray mb-6">
                    Offrir une plateforme où les passionnés de cuisine peuvent explorer, partager et découvrir des recettes uniques et délicieuses.
                </p>
                <h3 class="text-2xl font-bold text-brand-dark mb-4">Notre Vision</h3>
                <p class="text-brand-gray mb-6">
                    Créer une communauté culinaire mondiale où chacun peut exprimer sa créativité et trouver son inspiration.
                </p>
            </div>
            <div>
                <h3 class="text-2xl font-bold text-brand-dark mb-4">À propos de la Fondatrice du site</h3>
                <p class="text-brand-gray mb-6">
                    <strong>Fatima-Ezzahra Alouane</strong> a fondé Un Zeste d'Inspiration avec la passion de la cuisine. Elle offre aux personnes du monde entier la possibilité de partager leurs expériences culinaires et leurs recettes, afin de rassembler les amateurs de cuisine du monde entier.
                </p>
                <img src="https://images.unsplash.com/photo-1551024506-0bccd828d307" alt="Chef Pierre Dupont" class="w-full h-64 object-cover rounded-2xl">
            </div>
        </div>
    </div>
</section>

<!-- Call-to-Action Luxueux -->
<section class="py-20 relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-r from-primary to-secondary opacity-90"></div>
    <div class="max-w-4xl mx-auto px-4 relative z-10 text-center">
        <h2 class="playfair text-4xl md:text-5xl font-bold text-white mb-6">
            Rejoignez Notre Communauté d'Épicuriens
        </h2>
        <p class="text-white/90 text-lg mb-10">
            Partagez vos créations culinaires et découvrez un monde de saveurs extraordinaires
        </p>
        <a href="{{ route('register') }}" class="bg-white text-primary px-10 py-4 rounded-full font-medium text-lg hover:shadow-2xl transform hover:scale-105 transition-all duration-300">
            Commencer l'Aventure
        </a>
    </div>
</section>

@endsection