<section id="content-section" class="hidden space-y-6">
    <div class="flex justify-between items-center">
        <h1 class="playfair text-2xl md:text-3xl font-bold text-brand-burgundy">Modération de Contenu</h1>
        <div class="flex space-x-3">
            <!-- <button
                            class="bg-brand-peach text-brand-burgundy px-4 py-2 rounded-lg hover:bg-brand-burgundy hover:text-white transition-all">
                            <i class="fas fa-filter mr-2"></i>Filtres
                        </button> -->
        </div>
    </div>

    <!-- Tabs -->
    <div class="flex border-b border-gray-200">
        <button class="px-4 py-2 border-b-2 border-brand-burgundy text-brand-burgundy font-medium">
            En attente
        </button>
        <button class="px-4 py-2 text-gray-500 hover:text-brand-burgundy">
            Approuvés
        </button>
        <button class="px-4 py-2 text-gray-500 hover:text-brand-burgundy">
            Rejetés
        </button>
        <!-- <button class="px-4 py-2 text-gray-500 hover:text-brand-burgundy">
                        Signalés
                    </button> -->
    </div>

    <!-- Search and Filters -->
    <!-- <div class="flex flex-col md:flex-row justify-between space-y-3 md:space-y-0">
                    <div class="relative">
                        <input type="text" placeholder="Rechercher une recette..."
                            class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand-burgundy focus:border-transparent w-full md:w-80">
                        <span class="absolute left-3 top-2.5 text-gray-400">
                            <i class="fas fa-search"></i>
                        </span>
                    </div>
                    <div class="flex space-x-3">
                        <select
                            class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand-burgundy">
                            <option>Toutes les catégories</option>
                            <option>Plats Principaux</option>
                            <option>Desserts</option>
                            <option>Entrées</option>
                            <option>Boissons</option>
                        </select>
                        <select
                            class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand-burgundy">
                            <option>Type de contenu</option>
                            <option>Recettes</option>
                            <option>Expériences culinaires</option>
                        </select>
                    </div>
                </div> -->

    <!-- Content Moderation Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Recipe Card 1 -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="h-48 overflow-hidden">
                <img src="https://www.herta.fr/sites/default/files/styles/scale_crop_720_500/public/2023-04/Small_FR_herta_1220_Tarte%20Tatin%20pate%20brisee_301.jpg.webp?itok=MuMP3o74" alt="Recipe" class="w-full h-full object-cover" />
            </div>
            <div class="p-4">
                <div class="flex justify-between items-start mb-2">
                    <h3 class="playfair text-lg font-bold text-brand-burgundy">Tarte Tatin aux Pommes</h3>
                    <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full text-xs">
                        En attente
                    </span>
                </div>
                <p class="text-sm text-gray-600 mb-3">Soumis par <span class="font-medium">Fatima-Ezzahra
                    </span></p>
                <div class="flex justify-between items-center mb-3">
                    <div class="text-sm text-gray-500">
                        <i class="fas fa-utensils mr-1"></i> Dessert
                    </div>
                    <div class="text-sm text-gray-500">
                        <i class="fas fa-clock mr-1"></i> 20 Mars 2025
                    </div>
                </div>
                <div class="flex space-x-2">
                    <button
                        class="flex-1 bg-brand-burgundy text-white py-2 rounded-lg hover:bg-brand-red transition-all">
                        <i class="fas fa-check mr-1"></i> Approuver
                    </button>
                    <button
                        class="flex-1 bg-gray-200 text-gray-700 py-2 rounded-lg hover:bg-gray-300 transition-all">
                        <i class="fas fa-times mr-1"></i> Rejeter
                    </button>
                    <!-- <button
                                    class="px-3 py-2 bg-brand-peach text-brand-burgundy rounded-lg hover:bg-brand-burgundy hover:text-white transition-all">
                                    <i class="fas fa-eye"></i>
                                </button> -->
                </div>
            </div>
        </div>

        <!-- Recipe Card 2 -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="h-48 overflow-hidden">
                <img src="https://img.passeportsante.net/1200x675/2021-03-29/i101004-.webp" alt="Recipe" class="w-full h-full object-cover" />
            </div>
            <div class="p-4">
                <div class="flex justify-between items-start mb-2">
                    <h3 class="playfair text-lg font-bold text-brand-burgundy">Risotto aux Champignons</h3>
                    <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full text-xs">
                        En attente
                    </span>
                </div>
                <p class="text-sm text-gray-600 mb-3">Soumis par <span class="font-medium">Fatima
                    </span></p>
                <div class="flex justify-between items-center mb-3">
                    <div class="text-sm text-gray-500">
                        <i class="fas fa-utensils mr-1"></i> Plat Principal
                    </div>
                    <div class="text-sm text-gray-500">
                        <i class="fas fa-clock mr-1"></i> 19 Mars 2025
                    </div>
                </div>
                <div class="flex space-x-2">
                    <button
                        class="flex-1 bg-brand-burgundy text-white py-2 rounded-lg hover:bg-brand-red transition-all">
                        <i class="fas fa-check mr-1"></i> Approuver
                    </button>
                    <button
                        class="flex-1 bg-gray-200 text-gray-700 py-2 rounded-lg hover:bg-gray-300 transition-all">
                        <i class="fas fa-times mr-1"></i> Rejeter
                    </button>
                    <!-- <button
                                    class="px-3 py-2 bg-brand-peach text-brand-burgundy rounded-lg hover:bg-brand-burgundy hover:text-white transition-all">
                                    <i class="fas fa-eye"></i>
                                </button> -->
                </div>
            </div>
        </div>

        <!-- Experience Card -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="h-48 overflow-hidden">
                <img src="https://galet-plage.fr/wp-content/uploads/2024/10/guide_patisseries_nice_6984.jpg" alt="Experience" class="w-full h-full object-cover" />
            </div>
            <div class="p-4">
                <div class="flex justify-between items-start mb-2">
                    <h3 class="playfair text-lg font-bold text-brand-burgundy">Atelier Pâtisserie Française
                    </h3>
                    <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full text-xs">
                        En attente
                    </span>
                </div>
                <p class="text-sm text-gray-600 mb-3">Soumis par <span class="font-medium">Fatima</span>
                </p>
                <div class="flex justify-between items-center mb-3">
                    <div class="text-sm text-gray-500">
                        <i class="fas fa-cookie-bite mr-1"></i> Expérience
                    </div>
                    <div class="text-sm text-gray-500">
                        <i class="fas fa-clock mr-1"></i> 18 Mars 2025
                    </div>
                </div>
                <div class="flex space-x-2">
                    <button
                        class="flex-1 bg-brand-burgundy text-white py-2 rounded-lg hover:bg-brand-red transition-all">
                        <i class="fas fa-check mr-1"></i> Approuver
                    </button>
                    <button
                        class="flex-1 bg-gray-200 text-gray-700 py-2 rounded-lg hover:bg-gray-300 transition-all">
                        <i class="fas fa-times mr-1"></i> Rejeter
                    </button>
                    <!-- <button
                                    class="px-3 py-2 bg-brand-peach text-brand-burgundy rounded-lg hover:bg-brand-burgundy hover:text-white transition-all">
                                    <i class="fas fa-eye"></i>
                                </button> -->
                </div>
            </div>
        </div>
    </div>

    <!-- Pagination -->
    <div class="flex justify-center mt-6">
        <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
            <a href="#"
                class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                <i class="fas fa-chevron-left"></i>
            </a>
            <a href="#"
                class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-brand-burgundy text-sm font-medium text-white">
                1
            </a>
            <a href="#"
                class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                2
            </a>
            <a href="#"
                class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                3
            </a>
            <a href="#"
                class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                <i class="fas fa-chevron-right"></i>
            </a>
        </nav>
    </div>
</section>