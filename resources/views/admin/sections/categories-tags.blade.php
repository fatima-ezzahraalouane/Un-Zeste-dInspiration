<section id="categories-section" class="hidden space-y-6">
    <div class="flex justify-between items-center">
        <h1 class="playfair text-2xl md:text-3xl font-bold text-brand-burgundy">Gestion du Contenu</h1>
    </div>

    <!-- Tabs -->
    <div class="flex border-b border-gray-200">
        <button class="px-4 py-2 border-b-2 border-brand-burgundy text-brand-burgundy font-medium" onclick="showTab('recipes-tab')">
            Recettes
        </button>
        <button class="px-4 py-2 text-gray-500 hover:text-brand-burgundy" onclick="showTab('experiences-tab')">
            Expériences
        </button>
        <button class="px-4 py-2 text-gray-500 hover:text-brand-burgundy" onclick="showTab('categories-tab')">
            Catégories
        </button>
        <button class="px-4 py-2 text-gray-500 hover:text-brand-burgundy" onclick="showTab('tags-tab')">
            Tags
        </button>
        <button class="px-4 py-2 text-gray-500 hover:text-brand-burgundy" onclick="showTab('themes-tab')">
            Thèmes
        </button>
    </div>

    <!-- Recipes Tab -->
    <div id="recipes-tab" class="space-y-6">
        <div class="flex justify-between items-center">
            <h2 class="text-xl font-bold text-brand-burgundy">Gestion des Recettes</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($recipes as $recipe)
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <div class="h-48 overflow-hidden">
                    <img src="{{ $recipe->image }}" alt="{{ $recipe->title }}" class="w-full h-full object-cover">
                </div>
                <div class="p-4">
                    <div class="flex justify-between items-start mb-2">
                        <h3 class="playfair text-lg font-bold text-brand-burgundy">{{ $recipe->title }}</h3>
                        <span class="px-2 py-1 rounded-full text-xs {{ $recipe->statut === 'Approuvé' ? 'bg-green-100 text-green-800' : ($recipe->statut === 'Rejeté' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                            {{ $recipe->statut }}
                        </span>
                    </div>
                    <p class="text-sm text-gray-600 mb-3">Par <span class="font-medium">{{ $recipe->chef->user->last_name }} {{ $recipe->chef->user->first_name }}</span></p>
                    <div class="flex justify-between items-center mb-3">
                        <div class="text-sm text-gray-500">
                            <i class="fas fa-utensils mr-1"></i> {{ $recipe->category->name }}
                        </div>
                        <div class="text-sm text-gray-500">
                            <i class="fas fa-clock mr-1"></i> {{ $recipe->created_at->format('d M Y') }}
                        </div>
                    </div>
                    <div class="flex space-x-2">
                        @if($recipe->statut === 'En attente')
                        <form action="{{ route('admin.recipes.approve', $recipe->id) }}" method="POST" class="flex-1">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="w-full bg-brand-burgundy text-white py-2 rounded-lg hover:bg-brand-red transition-all">
                                <i class="fas fa-check mr-1"></i> Approuver
                            </button>
                        </form>
                        <form action="{{ route('admin.recipes.reject', $recipe->id) }}" method="POST" class="flex-1">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="w-full bg-gray-200 text-gray-700 py-2 rounded-lg hover:bg-gray-300 transition-all">
                                <i class="fas fa-times mr-1"></i> Rejeter
                            </button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Experiences Tab -->
    <div id="experiences-tab" class="hidden space-y-6">
        <div class="flex justify-between items-center">
            <h2 class="text-xl font-bold text-brand-burgundy">Gestion des Expériences</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($experiences as $experience)
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <div class="h-48 overflow-hidden">
                    <img src="{{ $experience->image }}" alt="{{ $experience->title }}" class="w-full h-full object-cover">
                </div>
                <div class="p-4">
                    <div class="flex justify-between items-start mb-2">
                        <h3 class="playfair text-lg font-bold text-brand-burgundy">{{ $experience->title }}</h3>
                        <span class="px-2 py-1 rounded-full text-xs {{ $experience->statut === 'Approuvé' ? 'bg-green-100 text-green-800' : ($experience->statut === 'Rejeté' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                            {{ $experience->statut }}
                        </span>
                    </div>
                    <p class="text-sm text-gray-600 mb-3">Par <span class="font-medium">{{ $experience->gourmand->user->first_name }} {{ $experience->gourmand->user->last_name }}</span></p>
                    <div class="flex justify-between items-center mb-3">
                        <div class="text-sm text-gray-500">
                            <i class="fas fa-bookmark mr-1"></i> {{ $experience->theme->name }}
                        </div>
                        <div class="text-sm text-gray-500">
                            <i class="fas fa-clock mr-1"></i> {{ $experience->created_at->format('d M Y') }}
                        </div>
                    </div>
                    <div class="flex space-x-2">
                        @if($experience->statut === 'En attente')
                        <form action="{{ route('admin.experiences.approve', $experience->id) }}" method="POST" class="flex-1">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="w-full bg-brand-burgundy text-white py-2 rounded-lg hover:bg-brand-red transition-all">
                                <i class="fas fa-check mr-1"></i> Approuver
                            </button>
                        </form>
                        <form action="{{ route('admin.experiences.reject', $experience->id) }}" method="POST" class="flex-1">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="w-full bg-gray-200 text-gray-700 py-2 rounded-lg hover:bg-gray-300 transition-all">
                                <i class="fas fa-times mr-1"></i> Rejeter
                            </button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Categories Tab -->
    <div id="categories-tab" class="hidden space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Categories List -->
            <div class="md:col-span-2">
                <div class="bg-white rounded-xl shadow-md p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-bold text-brand-burgundy">Liste des Catégories</h3>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full">
                            <thead>
                                <tr class="border-b">
                                    <th class="text-left py-3 px-2">Nom</th>
                                    <th class="text-left py-3 px-2">Nb. Recettes</th>
                                    <th class="text-left py-3 px-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="py-3 px-2">{{ $category->name }}</td>
                                    <td class="py-3 px-2">{{ $category->recipes_count ?? 0 }}</td>
                                    <td class="py-3 px-2">
                                        <div class="flex space-x-2">
                                            <button onclick="editCategory({{ $category->id }}, '{{ $category->name }}')" class="text-brand-burgundy hover:text-brand-red">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-brand-burgundy hover:text-brand-red">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Add/Edit Category -->
            <div>
                <div class="bg-white rounded-xl shadow-md p-6">
                    <h3 class="text-lg font-bold text-brand-burgundy mb-4">Ajouter une Catégorie</h3>
                    <form id="category-form" method="POST" class="space-y-4" action="{{ route('categories.store') }}">
                        @csrf
                        <input type="hidden" id="category-id" name="id">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nom de la Catégorie</label>
                            <input type="text" name="name" id="category-name" placeholder="Ex: Cuisine Méditerranéenne"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand-burgundy focus:border-transparent">
                        </div>
                        <div class="flex justify-end pt-2">
                            <button type="submit"
                                class="bg-brand-burgundy text-white px-6 py-2 rounded-lg hover:bg-brand-red transition-all">
                                <i class="fas fa-save mr-2"></i><span id="submit-label">Enregistrer</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Tags Tab -->
    <div id="tags-tab" class="hidden space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Tags List -->
            <div class="md:col-span-2">
                <div class="bg-white rounded-xl shadow-md p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-bold text-brand-burgundy">Liste des Tags</h3>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full">
                            <thead>
                                <tr class="border-b">
                                    <th class="text-left py-3 px-2">Nom</th>
                                    <th class="text-left py-3 px-2">Nb. Recettes</th>
                                    <th class="text-left py-3 px-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tags as $tag)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="py-3 px-2">{{ $tag->name }}</td>
                                    <td class="py-3 px-2">{{ $tag->recipes_count ?? 0 }}</td>
                                    <td class="py-3 px-2">
                                        <div class="flex space-x-2">
                                            <button onclick="editTag({{ $tag->id }}, '{{ $tag->name }}')" class="text-brand-burgundy hover:text-brand-red">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <form action="{{ route('tags.destroy', $tag->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-brand-burgundy hover:text-brand-red">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Add/Edit Tag -->
            <div>
                <div class="bg-white rounded-xl shadow-md p-6">
                    <h3 class="text-lg font-bold text-brand-burgundy mb-4">Ajouter un Tag</h3>
                    <form id="tag-form" method="POST" class="space-y-4" action="{{ route('tags.store') }}">
                        @csrf
                        <input type="hidden" id="tag-id" name="id">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nom du Tag</label>
                            <input type="text" name="name" id="tag-name" placeholder="Ex: SansGluten"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand-burgundy focus:border-transparent">
                        </div>
                        <div class="flex justify-end pt-2">
                            <button type="submit"
                                class="bg-brand-burgundy text-white px-6 py-2 rounded-lg hover:bg-brand-red transition-all">
                                <i class="fas fa-save mr-2"></i><span id="tag-submit-label">Enregistrer</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Themes Tab -->
    <div id="themes-tab" class="hidden space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Themes List -->
            <div class="md:col-span-2">
                <div class="bg-white rounded-xl shadow-md p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-bold text-brand-burgundy">Liste des Thèmes</h3>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach($themes as $theme)
                        <div class="p-4 border rounded-lg hover:bg-brand-peach/20 transition-all">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h4 class="font-medium">{{ $theme->name }}</h4>
                                    <p class="text-sm text-gray-600">{{ $theme->experiences_count ?? 0 }} expériences associées</p>
                                </div>
                                <div class="flex space-x-2">
                                    <button onclick="editTheme({{ $theme->id }}, '{{ $theme->name }}', '{{ $theme->description }}', '{{ $theme->image }}')" class="text-brand-burgundy hover:text-brand-red">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <form action="{{ route('themes.destroy', $theme->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-brand-burgundy hover:text-brand-red">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Add/Edit Theme -->
            <div>
                <div class="bg-white rounded-xl shadow-md p-6">
                    <h3 class="text-lg font-bold text-brand-burgundy mb-4">Ajouter un Thème</h3>
                    <form id="theme-form" method="POST" class="space-y-4" action="{{ route('themes.store') }}">
                        @csrf
                        <input type="hidden" id="theme-id" name="id">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nom du Thème</label>
                            <input type="text" name="name" id="theme-name" placeholder="Ex: Cuisine Française"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand-burgundy focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                            <textarea name="description" id="theme-description" rows="3" placeholder="Décrivez ce thème culinaire..."
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand-burgundy focus:border-transparent"></textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Image de couverture</label>
                            <input type="text" name="image" id="theme-cover-image" placeholder="Url de l'image"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand-burgundy focus:border-transparent">
                        </div>
                        <div class="flex justify-end pt-2">
                            <button type="submit"
                                class="bg-brand-burgundy text-white px-6 py-2 rounded-lg hover:bg-brand-red transition-all">
                                <i class="fas fa-save mr-2"></i><span id="theme-submit-label">Enregistrer</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function showTab(tabId) {
        // Hide all tabs
        document.querySelectorAll('[id$="-tab"]').forEach(tab => {
            tab.classList.add('hidden');
        });

        // Show selected tab
        document.getElementById(tabId).classList.remove('hidden');

        // Update tab buttons
        document.querySelectorAll('.flex.border-b button').forEach(button => {
            button.classList.remove('border-b-2', 'border-brand-burgundy', 'text-brand-burgundy', 'font-medium');
            button.classList.add('text-gray-500');
        });

        // Highlight selected tab button
        event.target.classList.remove('text-gray-500');
        event.target.classList.add('border-b-2', 'border-brand-burgundy', 'text-brand-burgundy', 'font-medium');
    }

    function editCategory(id, name) {
        document.getElementById('category-id').value = id;
        document.getElementById('category-name').value = name;
        document.getElementById('submit-label').textContent = 'Mettre à jour';
    }

    function editTag(id, name) {
        document.getElementById('tag-id').value = id;
        document.getElementById('tag-name').value = name;
        document.getElementById('tag-submit-label').textContent = 'Mettre à jour';
    }

    function editTheme(id, name, description, coverImage) {
        document.getElementById('theme-id').value = id;
        document.getElementById('theme-name').value = name;
        document.getElementById('theme-description').value = description;
        document.getElementById('theme-cover-image').value = coverImage;
        document.getElementById('theme-submit-label').textContent = 'Mettre à jour';
    }
</script>