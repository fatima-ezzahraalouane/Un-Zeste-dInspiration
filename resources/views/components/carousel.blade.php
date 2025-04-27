<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 relative">
        <h2 class="playfair text-4xl font-bold text-brand-burgundy text-center mb-12">Les Recettes en Vedette</h2>
        <div class="carousel-container">
            <div class="carousel-track">
                @foreach($recipes as $recipe)
                    <div class="carousel-item">
                        <img src="{{ $recipe->image ?? 'https://via.placeholder.com/400x300' }}"
                            alt="{{ $recipe->title }}" class="w-full h-80 object-cover rounded-lg">
                        <div class="carousel-content">
                            <h3 class="text-xl font-bold">{{ $recipe->title }}</h3>
                            <p>{{ Str::limit($recipe->description, 30) }}</p>
                            <a href="#" class="block text-center px-4 py-2 bg-brand-burgundy text-white rounded-full hover:bg-brand-red transition-colors">
                                Voir la recette
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
