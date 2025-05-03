<section id="recettes-section" class="bg-white rounded-lg shadow-xl p-6 mb-8 hidden">
    <div class="flex justify-between items-center mb-6">
        <h2 class="playfair text-2xl font-bold text-brand-burgundy">Mes Recettes</h2>
        <a href="#" class="shine-effect px-4 py-2 bg-brand-burgundy text-white rounded-full hover:shadow-lg transform hover:scale-105 transition-all duration-300">
            <i class="fas fa-plus mr-2"></i> Nouvelle Recette
        </a>
    </div>

    <!-- <div class="mb-6">
        <div class="relative">
            <input type="text" placeholder="Rechercher vos recettes..." class="w-full p-3 pl-10 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-brand-burgundy">
            <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-brand-gray"></i>
        </div>
    </div> -->

    <!-- Filters -->
    <!-- <div class="flex flex-wrap gap-3 mb-6">
        <button class="px-4 py-2 bg-brand-burgundy text-white rounded-full hover:bg-brand-coral transition-colors">Toutes (12)</button>
        <button class="px-4 py-2 bg-white text-brand-burgundy border border-brand-burgundy rounded-full hover:bg-brand-peach transition-colors">Publiées (8)</button>
        <button class="px-4 py-2 bg-white text-brand-burgundy border border-brand-burgundy rounded-full hover:bg-brand-peach transition-colors">Brouillons (4)</button>
    </div> -->

    <!-- recettes Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($recipes as $recipe)
        <div class="recette-card bg-white rounded-lg overflow-hidden shadow-md border border-gray-100">
            <div class="relative">
                <img src="{{ $recipe->image }}" alt="{{ $recipe->title }}" class="w-full h-40 object-cover">
                <div class="absolute top-2 right-2 flex space-x-2">
                    @if ($recipe->statut !== 'Approuver')
                    <button class="w-8 h-8 bg-white/80 rounded-full flex items-center justify-center text-brand-burgundy"
                        data-recipe-id="{{ $recipe->id }}"
                        data-recipe-title="{{ $recipe->title }}"
                        data-recipe-description="{{ $recipe->description }}"
                        data-recipe-image="{{ $recipe->image }}"
                        data-recipe-category="{{ $recipe->category_id }}"
                        onclick="openEditRecipeModal(this)">
                        <i class="fas fa-edit"></i>
                    </button>
                    @endif
                    <form action="{{ route('recipes.destroy', $recipe->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="w-8 h-8 bg-white/80 rounded-full flex items-center justify-center text-brand-burgundy hover:bg-white transition-all">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </div>
                <div class="absolute bottom-0 left-0 {{ $recipe->statut === 'Approuver' ? 'bg-brand-burgundy' : 'bg-gray-600' }} text-white px-3 py-1 text-xs">
                    {{ $recipe->statut === 'Approuver' ? 'Publié' : 'Brouillon' }}
                </div>
            </div>
            <div class="p-4">
                <h3 class="playfair text-lg font-bold text-brand-burgundy mb-2">{{ $recipe->title }}</h3>
                <div class="flex justify-between text-sm text-brand-gray mb-3">
                    <span><i class="far fa-calendar-alt mr-1"></i> {{ $recipe->created_at->format('d M Y') }}</span>
                </div>
                <div class="flex flex-wrap gap-2 mb-3">
                    <span class="bg-brand-peach text-brand-burgundy px-2 py-1 rounded-full text-xs">
                        {{ $recipe->category->name ?? 'Sans catégorie' }}
                    </span>
                </div>
            </div>
        </div>
        @empty
        <p class="text-brand-gray col-span-3 text-center">Aucune recette trouvée.</p>
        @endforelse
    </div>
    
    <!-- Pagination -->
    @if ($recipes->count())
    <div class="flex justify-center mt-8">
        <nav class="flex items-center space-x-1">
            @if ($recipes->onFirstPage())
            <span class="px-3 py-1 rounded border border-gray-300 text-brand-gray opacity-50">
                <i class="fas fa-chevron-left"></i>
            </span>
            @else
            <a href="{{ $recipes->previousPageUrl() }}" class="px-3 py-1 rounded border border-gray-300 text-brand-gray hover:bg-brand-peach hover:text-brand-burgundy transition-colors">
                <i class="fas fa-chevron-left"></i>
            </a>
            @endif

            @foreach ($recipes->getUrlRange(1, $recipes->lastPage()) as $page => $url)
            @if ($page == $recipes->currentPage())
            <span class="px-3 py-1 rounded border border-gray-300 bg-brand-burgundy text-white">{{ $page }}</span>
            @else
            <a href="{{ $url }}" class="px-3 py-1 rounded border border-gray-300 text-brand-gray hover:bg-brand-peach hover:text-brand-burgundy transition-colors">
                {{ $page }}
            </a>
            @endif
            @endforeach

            @if ($recipes->hasMorePages())
            <a href="{{ $recipes->nextPageUrl() }}" class="px-3 py-1 rounded border border-gray-300 text-brand-gray hover:bg-brand-peach hover:text-brand-burgundy transition-colors">
                <i class="fas fa-chevron-right"></i>
            </a>
            @else
            <span class="px-3 py-1 rounded border border-gray-300 text-brand-gray opacity-50">
                <i class="fas fa-chevron-right"></i>
            </span>
            @endif
        </nav>
    </div>
    @endif
</section>