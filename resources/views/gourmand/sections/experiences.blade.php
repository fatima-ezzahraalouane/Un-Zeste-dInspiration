<section id="experiences-section" class="bg-white rounded-lg shadow-xl p-6 mb-8 hidden">
    <div class="flex justify-between items-center mb-6">
        <h2 class="playfair text-2xl font-bold text-brand-burgundy">Mes Expériences Culinaires</h2>
        <button type="button" id="openModal"
            class="px-4 py-2 bg-brand-burgundy text-white rounded-full hover:shadow-lg transform hover:scale-105 transition-all duration-300">
            <i class="fas fa-plus mr-2"></i> Nouvelle Expérience
        </button>
    </div>

    <!-- Filters -->
    <!-- <div class="flex flex-wrap gap-3 mb-6">
        <button class="px-4 py-2 bg-brand-burgundy text-white rounded-full hover:bg-brand-coral transition-colors">Toutes (12)</button>
        <button class="px-4 py-2 bg-white text-brand-burgundy border border-brand-burgundy rounded-full hover:bg-brand-peach transition-colors">Publiées (8)</button>
        <button class="px-4 py-2 bg-white text-brand-burgundy border border-brand-burgundy rounded-full hover:bg-brand-peach transition-colors">Brouillons (4)</button>
    </div> -->

    <!-- Experiences Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($experiences as $experience)
        <div class="experience-card bg-white rounded-lg overflow-hidden shadow-md border border-gray-100">
            <div class="relative">
                <img src="{{ $experience->image }}" alt="{{ $experience->title }}" class="w-full h-40 object-cover">
                <div class="absolute top-2 right-2 flex space-x-2">
                    <button class="w-8 h-8 bg-white/80 rounded-full flex items-center justify-center text-brand-burgundy hover:bg-white transition-all">
                        <i class="fas fa-edit"></i>
                    </button>
                    <form action="{{ route('experiences.destroy', $experience->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="w-8 h-8 bg-white/80 rounded-full flex items-center justify-center text-brand-burgundy hover:bg-white transition-all">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </div>
                <div class="absolute bottom-0 left-0 {{ $experience->statut === 'Approuvé' ? 'bg-brand-burgundy' : 'bg-gray-600' }} text-white px-3 py-1 text-xs">
                    {{ $experience->statut === 'Approuvé' ? 'Publié' : 'Brouillon' }}
                </div>
            </div>
            <div class="p-4">
                <h3 class="playfair text-lg font-bold text-brand-burgundy mb-2">{{ $experience->title }}</h3>
                <div class="flex justify-between text-sm text-brand-gray mb-3">
                    <span><i class="far fa-calendar-alt mr-1"></i> {{ $experience->created_at->format('d M Y') }}</span>
                </div>
                <div class="flex flex-wrap gap-2 mb-3">
                    <span class="bg-brand-peach text-brand-burgundy px-2 py-1 rounded-full text-xs">
                        {{ $experience->theme->name ?? 'Sans thème' }}
                    </span>
                </div>
                <a href="{{ route('gourmand.experiences.show', $experience->id) }}" class="text-brand-burgundy hover:text-brand-coral text-sm font-medium">
                    {{ $experience->statut === 'Approuvé' ? 'Voir l\'expérience' : 'Éditer le brouillon' }}
                    <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>
        </div>
        @empty
        <p class="text-brand-gray col-span-3">Aucune expérience trouvée.</p>
        @endforelse
    </div>


    <!-- Pagination -->
    <div class="flex justify-center mt-8">
        <nav class="flex items-center space-x-1">
            <a href="#" class="px-3 py-1 rounded border border-gray-300 text-brand-gray hover:bg-brand-peach hover:text-brand-burgundy transition-colors">
                <i class="fas fa-chevron-left"></i>
            </a>
            <a href="#" class="px-3 py-1 rounded border border-gray-300 bg-brand-burgundy text-white">1</a>
            <a href="#" class="px-3 py-1 rounded border border-gray-300 text-brand-gray hover:bg-brand-peach hover:text-brand-burgundy transition-colors">2</a>
            <a href="#" class="px-3 py-1 rounded border border-gray-300 text-brand-gray hover:bg-brand-peach hover:text-brand-burgundy transition-colors">3</a>
            <span class="px-3 py-1 text-brand-gray">...</span>
            <a href="#" class="px-3 py-1 rounded border border-gray-300 text-brand-gray hover:bg-brand-peach hover:text-brand-burgundy transition-colors">4</a>
            <a href="#" class="px-3 py-1 rounded border border-gray-300 text-brand-gray hover:bg-brand-peach hover:text-brand-burgundy transition-colors">
                <i class="fas fa-chevron-right"></i>
            </a>
        </nav>
    </div>
</section>

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