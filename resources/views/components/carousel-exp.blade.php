<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 relative">
        <h2 class="playfair text-4xl font-bold text-brand-burgundy text-center mb-12">Les Expériences les Plus
            Commentées</h2>
        <div class="carousel-container">
            <div class="carousel-track">
                @foreach($experiences as $experience)
                <div class="carousel-item">
                    <img src="{{ $experience->image ?? 'https://via.placeholder.com/400x300' }}"
                        alt="Expérience Culinaire" class="w-full h-80 object-cover rounded-lg">
                    <div class="carousel-content">
                        <h3 class="text-xl font-bold">{{ $experience->title }}</h3>
                        <p>{{ Str::limit($experience->description, 30) }}</p>
                        <a href="{{ route('gourmand.experiences.show', $experience->id) }}"
                            class="block text-center px-4 py-2 bg-brand-burgundy text-white rounded-full hover:bg-brand-red transition-colors">Lire
                            la suite</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>