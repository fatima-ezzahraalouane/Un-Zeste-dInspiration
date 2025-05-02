<section id="recettes-section" class="bg-white rounded-lg shadow-xl p-6 mb-8 hidden">
    <div class="flex justify-between items-center mb-6">
        <h2 class="playfair text-2xl font-bold text-brand-burgundy">Mes Recettes</h2>
        <a href="#" class="shine-effect px-4 py-2 bg-brand-burgundy text-white rounded-full hover:shadow-lg transform hover:scale-105 transition-all duration-300">
            <i class="fas fa-plus mr-2"></i> Nouvelle Recette
        </a>
    </div>

    <div class="mb-6">
        <div class="relative">
            <input type="text" placeholder="Rechercher vos recettes..." class="w-full p-3 pl-10 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-brand-burgundy">
            <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-brand-gray"></i>
        </div>
    </div>

    <!-- Filters -->
    <div class="flex flex-wrap gap-3 mb-6">
        <button class="px-4 py-2 bg-brand-burgundy text-white rounded-full hover:bg-brand-coral transition-colors">Toutes (12)</button>
        <button class="px-4 py-2 bg-white text-brand-burgundy border border-brand-burgundy rounded-full hover:bg-brand-peach transition-colors">Publiées (8)</button>
        <button class="px-4 py-2 bg-white text-brand-burgundy border border-brand-burgundy rounded-full hover:bg-brand-peach transition-colors">Brouillons (4)</button>
    </div>

    <!-- recettes Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- recette Card 1 -->
        <div class="recette-card bg-white rounded-lg overflow-hidden shadow-md border border-gray-100">
            <div class="relative">
                <img src="https://www.hervecuisine.com/wp-content/uploads/2016/06/recette-tarte-aux-fraises-facile-1024x683.jpg" alt="Tarte aux fraises maison" class="w-full h-40 object-cover">
                <div class="absolute top-2 right-2 flex space-x-2">
                    <button class="w-8 h-8 bg-white/80 rounded-full flex items-center justify-center text-brand-burgundy hover:bg-white transition-all">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button class="w-8 h-8 bg-white/80 rounded-full flex items-center justify-center text-brand-burgundy hover:bg-white transition-all">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
                <div class="absolute bottom-0 left-0 bg-brand-burgundy text-white px-3 py-1 text-xs">
                    Publié
                </div>
            </div>
            <div class="p-4">
                <h3 class="playfair text-lg font-bold text-brand-burgundy mb-2">Tarte aux fraises maison</h3>
                <div class="flex justify-between text-sm text-brand-gray mb-3">
                    <span><i class="far fa-calendar-alt mr-1"></i> 12 mars 2025</span>
                </div>
                <div class="flex flex-wrap gap-2 mb-3">
                    <span class="bg-brand-peach text-brand-burgundy px-2 py-1 rounded-full text-xs">Pâtisserie</span>
                </div>
                <a href="#" class="text-brand-burgundy hover:text-brand-coral text-sm font-medium">Voir la recette <i class="fas fa-arrow-right ml-1"></i></a>
            </div>
        </div>

        <!-- recette Card 2 -->
        <div class="recette-card bg-white rounded-lg overflow-hidden shadow-md border border-gray-100">
            <div class="relative">
                <img src="https://www.unileverfoodsolutions.be/dam/global-ufs/mcos/belgium/calcmenu/recipes/the-vegetarian-butcher/Thai_Green_Curry_1260x709px.png" alt="Curry vert thaïlandais" class="w-full h-40 object-cover">
                <div class="absolute top-2 right-2 flex space-x-2">
                    <button class="w-8 h-8 bg-white/80 rounded-full flex items-center justify-center text-brand-burgundy hover:bg-white transition-all">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button class="w-8 h-8 bg-white/80 rounded-full flex items-center justify-center text-brand-burgundy hover:bg-white transition-all">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
                <div class="absolute bottom-0 left-0 bg-brand-burgundy text-white px-3 py-1 text-xs">
                    Publié
                </div>
            </div>
            <div class="p-4">
                <h3 class="playfair text-lg font-bold text-brand-burgundy mb-2">Curry vert thaïlandais</h3>
                <div class="flex justify-between text-sm text-brand-gray mb-3">
                    <span><i class="far fa-calendar-alt mr-1"></i> 28 février 2025</span>
                </div>
                <div class="flex flex-wrap gap-2 mb-3">
                    <span class="bg-brand-peach text-brand-burgundy px-2 py-1 rounded-full text-xs">Cuisine asiatique</span>
                </div>
                <a href="#" class="text-brand-burgundy hover:text-brand-coral text-sm font-medium">Voir la recette <i class="fas fa-arrow-right ml-1"></i></a>
            </div>
        </div>

        <!-- recette Card 3 -->
        <div class="recette-card bg-white rounded-lg overflow-hidden shadow-md border border-gray-100">
            <div class="relative">
                <img src="https://img.passeportsante.net/1200x675/2021-03-29/i101004-.webp" alt="Risotto aux champignons" class="w-full h-40 object-cover">
                <div class="absolute top-2 right-2 flex space-x-2">
                    <button class="w-8 h-8 bg-white/80 rounded-full flex items-center justify-center text-brand-burgundy hover:bg-white transition-all">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button class="w-8 h-8 bg-white/80 rounded-full flex items-center justify-center text-brand-burgundy hover:bg-white transition-all">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
                <div class="absolute bottom-0 left-0 bg-gray-600 text-white px-3 py-1 text-xs">
                    Brouillon
                </div>
            </div>
            <div class="p-4">
                <h3 class="playfair text-lg font-bold text-brand-burgundy mb-2">Risotto aux champignons</h3>
                <div class="flex justify-between text-sm text-brand-gray mb-3">
                    <span><i class="far fa-calendar-alt mr-1"></i> 5 mars 2025</span>
                </div>
                <div class="flex flex-wrap gap-2 mb-3">
                    <span class="bg-brand-peach text-brand-burgundy px-2 py-1 rounded-full text-xs">Italien</span>
                </div>
                <a href="#" class="text-brand-burgundy hover:text-brand-coral text-sm font-medium">Éditer le brouillon <i class="fas fa-pencil-alt ml-1"></i></a>
            </div>
        </div>

        <!-- Add more recette cards here -->
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