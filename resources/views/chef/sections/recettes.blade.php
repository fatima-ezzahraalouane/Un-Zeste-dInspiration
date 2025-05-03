<section id="recettes-section" class="bg-white rounded-lg shadow-xl p-6 mb-8 hidden">
    <div class="flex justify-between items-center mb-6">
        <h2 class="playfair text-2xl font-bold text-brand-burgundy">Mes Recettes</h2>
        <button type="button" id="openModal"
            class="px-4 py-2 bg-brand-burgundy text-white rounded-full hover:shadow-lg transform hover:scale-105 transition-all duration-300">
            <i class="fas fa-plus mr-2"></i> Nouvelle Recette
        </button>
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
                        onclick="openEditModal(this)">
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

<!-- Modal d'ajout recette -->
<div id="recipeModal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center p-4 hidden z-50">
    <div class="bg-white p-6 sm:p-8 rounded-lg shadow-lg w-full max-w-4xl mx-auto">
        <h2 class="text-2xl font-bold text-brand-burgundy mb-6">Ajouter une Recette</h2>

        <form method="POST" action="{{ route('recipes.store') }}">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                <!-- Titre -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Titre <span class="text-red-500 font-bold">*</span></label>
                    <input type="text" name="title" required class="w-full px-4 py-2 border rounded-lg mb-3">
                </div>

                <!-- Image -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Image (URL) <span class="text-red-500 font-bold">*</span></label>
                    <input type="url" name="image" required class="w-full px-4 py-2 border rounded-lg mb-3">
                </div>

                <!-- Temps préparation -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Préparation (min) <span class="text-red-500 font-bold">*</span></label>
                    <input type="number" name="preparation_time" min="1" required class="w-full px-4 py-2 border rounded-lg mb-3">
                </div>

                <!-- Temps cuisson -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Cuisson (min) <span class="text-red-500 font-bold">*</span></label>
                    <input type="number" name="cooking_time" min="1" required class="w-full px-4 py-2 border rounded-lg mb-3">
                </div>

                <!-- Portions -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Portions <span class="text-red-500 font-bold">*</span></label>
                    <input type="number" name="servings" min="1" required class="w-full px-4 py-2 border rounded-lg mb-3">
                </div>

                <!-- Complexité -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Complexité <span class="text-red-500 font-bold">*</span></label>
                    <select name="complexity" required class="w-full px-4 py-2 border rounded-lg mb-3">
                        <option value="" disabled selected>Choisissez</option>
                        <option value="Facile">Facile</option>
                        <option value="Moyen">Moyen</option>
                        <option value="Difficile">Difficile</option>
                    </select>
                </div>

                <!-- Catégorie -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Catégorie <span class="text-red-500 font-bold">*</span></label>
                    <select name="category_id" required class="w-full px-4 py-2 border rounded-lg mb-3">
                        <option value="" disabled selected>Choisissez</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Tags -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Tags <span class="text-red-500 font-bold">*</span></label>
                    <select name="tags[]" multiple class="w-full px-4 py-2 border rounded-lg mb-3">
                        @foreach($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Description -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Description <span class="text-red-500 font-bold">*</span></label>
                    <textarea name="description" rows="3" required class="w-full px-4 py-2 border rounded-lg mb-3"></textarea>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <!-- Ingrédients -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Ingrédients (séparés par des virgules) <span class="text-red-500 font-bold">*</span></label>
                    <textarea name="ingredients" rows="2" required placeholder="ex: farine, sucre, œufs"
                        class="w-full px-4 py-2 border rounded-lg mb-3"></textarea>
                </div>

                <!-- Instructions -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Instructions (séparées par des virgules) <span class="text-red-500 font-bold">*</span></label>
                    <textarea name="instructions" rows="2" required placeholder="ex: Mélanger, Cuire, Servir chaud"
                        class="w-full px-4 py-2 border rounded-lg mb-4"></textarea>
                </div>
            </div>

            <!-- Boutons -->
            <div class="flex justify-end gap-3 mt-4">
                <button type="button" id="closeRecipeModal" class="bg-gray-300 px-4 py-2 rounded hover:bg-gray-400">Annuler</button>
                <button type="submit" class="bg-brand-burgundy text-white px-4 py-2 rounded hover:bg-brand-red">Ajouter</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal de modification -->
<div id="editRecipeModal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center p-4 hidden z-50">
    <div class="bg-white p-6 sm:p-8 rounded-lg shadow-lg w-full max-w-4xl mx-auto">
        <h2 class="text-2xl font-bold text-brand-burgundy mb-6">Modifier la Recette</h2>

        <form id="editRecipeForm" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="recipe_id" id="edit-recipe-id">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Titre -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Titre</label>
                    <input type="text" name="title" id="edit-title" required class="w-full px-4 py-2 border rounded-lg mb-3">
                </div>

                <!-- Image -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Image (URL)</label>
                    <input type="url" name="image" id="edit-image" required class="w-full px-4 py-2 border rounded-lg mb-3">
                </div>

                <!-- Temps préparation -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Préparation (min)</label>
                    <input type="number" name="preparation_time" id="edit-preparation" min="1" required class="w-full px-4 py-2 border rounded-lg mb-3">
                </div>

                <!-- Temps cuisson -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Cuisson (min)</label>
                    <input type="number" name="cooking_time" id="edit-cooking" min="1" required class="w-full px-4 py-2 border rounded-lg mb-3">
                </div>

                <!-- Portions -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Portions</label>
                    <input type="number" name="servings" id="edit-servings" min="1" required class="w-full px-4 py-2 border rounded-lg mb-3">
                </div>

                <!-- Complexité -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Complexité</label>
                    <select name="complexity" id="edit-complexity" required class="w-full px-4 py-2 border rounded-lg mb-3">
                        <option value="">Choisissez</option>
                        <option value="Facile">Facile</option>
                        <option value="Moyen">Moyen</option>
                        <option value="Difficile">Difficile</option>
                    </select>
                </div>

                <!-- Catégorie -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Catégorie</label>
                    <select name="category_id" id="edit-category" required class="w-full px-4 py-2 border rounded-lg mb-3">
                        <option value="">Choisissez une catégorie</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Tags -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Tags</label>
                    <select name="tags[]" id="edit-tags" multiple class="w-full px-4 py-2 border rounded-lg mb-3">
                        @foreach($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Description -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Description</label>
                <textarea name="description" id="edit-description" rows="3" required class="w-full px-4 py-2 border rounded-lg mb-3"></textarea>
            </div>

            <!-- Ingrédients -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Ingrédients (séparés par des virgules)</label>
                <textarea name="ingredients" id="edit-ingredients" rows="2" required class="w-full px-4 py-2 border rounded-lg mb-3"></textarea>
            </div>

            <!-- Instructions -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Instructions (séparées par des virgules)</label>
                <textarea name="instructions" id="edit-instructions" rows="3" required class="w-full px-4 py-2 border rounded-lg mb-4"></textarea>
            </div>

            <!-- Boutons -->
            <div class="flex justify-end gap-3 mt-4">
                <button type="button" id="closeEditRecipeModal" class="bg-gray-300 px-4 py-2 rounded hover:bg-gray-400">Annuler</button>
                <button type="submit" class="bg-brand-burgundy text-white px-4 py-2 rounded hover:bg-brand-red">Modifier</button>
            </div>
        </form>
    </div>
</div>