<section id="categories-section" class="hidden space-y-6">
    <div class="flex justify-between items-center">
        <h1 class="playfair text-2xl md:text-3xl font-bold text-brand-burgundy">Catégories & Tags</h1>
        <!-- <div class="flex space-x-3">
                        <button
                            class="bg-brand-burgundy text-white px-4 py-2 rounded-lg hover:bg-brand-red transition-all">
                            <i class="fas fa-plus mr-2"></i>Ajouter
                        </button>
                    </div> -->
    </div>

    <!-- Tabs -->
    <div class="flex border-b border-gray-200">
        <button class="px-4 py-2 border-b-2 border-brand-burgundy text-brand-burgundy font-medium">
            Catégories
        </button>
        <button class="px-4 py-2 text-gray-500 hover:text-brand-burgundy">
            Tags
        </button>
        <button class="px-4 py-2 text-gray-500 hover:text-brand-burgundy">
            Thèmes
        </button>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Categories Management -->
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

    <!-- Tags Management (initialement caché) -->
    <div id="tags-management" class="hidden grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Liste des Tags -->
        <div class="md:col-span-2">
            <div class="bg-white rounded-xl shadow-md p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-bold text-brand-burgundy">Liste des Tags</h3>
                    <!-- <div class="relative">
                                    <input type="text" placeholder="Rechercher un tag..."
                                        class="pl-8 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand-burgundy focus:border-transparent w-64">
                                    <span class="absolute left-2 top-2.5 text-gray-400">
                                        <i class="fas fa-search"></i>
                                    </span>
                                </div> -->
                </div>
                <!-- <div class="flex flex-wrap gap-2 mb-4">
                                <span
                                    class="px-3 py-1 bg-brand-peach text-brand-burgundy rounded-full text-sm flex items-center">
                                    #Végétarien
                                    <button class="ml-2 text-xs hover:text-brand-red"><i
                                            class="fas fa-times"></i></button>
                                </span>
                                <span
                                    class="px-3 py-1 bg-brand-peach text-brand-burgundy rounded-full text-sm flex items-center">
                                    #SansGluten
                                    <button class="ml-2 text-xs hover:text-brand-red"><i
                                            class="fas fa-times"></i></button>
                                </span>
                                <span
                                    class="px-3 py-1 bg-brand-peach text-brand-burgundy rounded-full text-sm flex items-center">
                                    #Rapide
                                    <button class="ml-2 text-xs hover:text-brand-red"><i
                                            class="fas fa-times"></i></button>
                                </span>
                            </div> -->
                <table class="min-w-full">
                    <thead>
                        <tr class="border-b">
                            <th class="text-left py-3 px-2">Tag</th>
                            <!-- <th class="text-left py-3 px-2">Utilisations</th> -->
                            <!-- <th class="text-left py-3 px-2">Statut</th> -->
                            <th class="text-left py-3 px-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Lignes de tags similaires aux catégories -->
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Ajouter/Éditer Tag -->
        <div>
            <div class="bg-white rounded-xl shadow-md p-6">
                <h3 class="text-lg font-bold text-brand-burgundy mb-4">Ajouter un Tag</h3>
                <form class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nom du Tag</label>
                        <input type="text" placeholder="Ex: SansGluten"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand-burgundy focus:border-transparent">
                    </div>
                    <!-- <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Type</label>
                                    <select
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand-burgundy">
                                        <option>Régime alimentaire</option>
                                        <option>Temps de préparation</option>
                                        <option>Niveau de difficulté</option>
                                        <option>Occasion</option>
                                    </select>
                                </div> -->
                    <button type="submit"
                        class="w-full bg-brand-burgundy text-white px-6 py-2 rounded-lg hover:bg-brand-red transition-all">
                        <i class="fas fa-plus mr-2"></i>Ajouter le Tag
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Themes Management (initialement caché) -->
    <div id="themes-management" class="hidden grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Liste des Thèmes -->
        <div class="md:col-span-2">
            <div class="bg-white rounded-xl shadow-md p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-bold text-brand-burgundy">Thèmes Culinaires</h3>
                    <!-- <div class="relative">
                                    <input type="text" placeholder="Rechercher un thème..."
                                        class="pl-8 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand-burgundy focus:border-transparent w-64">
                                    <span class="absolute left-2 top-2.5 text-gray-400">
                                        <i class="fas fa-search"></i>
                                    </span>
                                </div> -->
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                    <div class="p-4 border rounded-lg hover:bg-brand-peach/20 transition-all">
                        <div class="flex justify-between items-start">
                            <div>
                                <h4 class="font-medium">Cuisine Méditerranéenne</h4>
                                <p class="text-sm text-gray-600">42 expériences associées</p>
                            </div>
                            <div class="flex space-x-2">
                                <button class="text-brand-burgundy hover:text-brand-red">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="text-brand-burgundy hover:text-brand-red">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 border rounded-lg hover:bg-brand-peach/20 transition-all">
                        <div class="flex justify-between items-start">
                            <div>
                                <h4 class="font-medium">Cuisine Asiatique</h4>
                                <p class="text-sm text-gray-600">38 expériences associées</p>
                            </div>
                            <div class="flex space-x-2">
                                <button class="text-brand-burgundy hover:text-brand-red">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="text-brand-burgundy hover:text-brand-red">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- ... autres thèmes ... -->
                </div>
            </div>
        </div>

        <!-- Ajouter/Éditer Thème -->
        <div>
            <div class="bg-white rounded-xl shadow-md p-6">
                <h3 class="text-lg font-bold text-brand-burgundy mb-4">Ajouter un Thème</h3>
                <form class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nom du Thème</label>
                        <input type="text" placeholder="Ex: Cuisine Française"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand-burgundy focus:border-transparent">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                        <textarea rows="3" placeholder="Décrivez ce thème culinaire..."
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand-burgundy focus:border-transparent"></textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Image de
                            couverture</label>
                        <input type="text" placeholder="Url de l'image"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand-burgundy focus:border-transparent">
                    </div>
                    <button type="submit"
                        class="w-full bg-brand-burgundy text-white px-6 py-2 rounded-lg hover:bg-brand-red transition-all">
                        <i class="fas fa-plus mr-2"></i>Créer le Thème
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>