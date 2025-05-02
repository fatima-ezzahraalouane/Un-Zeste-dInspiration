<section id="personal-section" class="bg-white rounded-lg p-6 mb-8 shadow-xl">
    <div class="flex justify-between items-center mb-6">
        <h2 class="playfair text-2xl font-bold text-brand-burgundy">Informations Personnelles</h2>
        <button id="edit-profile-btn" class="text-brand-burgundy hover:text-brand-coral">
            <i class="fas fa-edit"></i> Modifier
        </button>
    </div>

    <!-- View Mode -->
    <div id="view-profile" class="space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <p class="text-brand-gray text-sm">Nom</p>
                <p class="font-medium">Alouane</p>
            </div>
            <div>
                <p class="text-brand-gray text-sm">Prénom</p>
                <p class="font-medium">Fatima-Ezzahra</p>
            </div>
            <div>
                <p class="text-brand-gray text-sm">Email</p>
                <p class="font-medium">chef.fatimaezzahra@email.com</p>
            </div>
            <!-- <div>
                                <p class="text-brand-gray text-sm">Téléphone</p>
                                <p class="font-medium">+33 6 12 34 56 78</p>
                            </div> -->
            <!-- <div>
                                <p class="text-brand-gray text-sm">Date de naissance</p>
                                <p class="font-medium">15 mars 1990</p>
                            </div> -->
            <div>
                <p class="text-brand-gray text-sm">Localisation</p>
                <p class="font-medium">Safi, Maroc</p>
            </div>
        </div>
        <div>
            <p class="text-brand-gray text-sm">À propos de moi</p>
            <p class="font-medium">Passionnée de cuisine depuis mon plus jeune âge,
                j'aime particulièrement expérimenter avec les saveurs méditerranéennes et asiatiques.
                Je partage ici mes recettes.</p>
        </div>
        <div>
            <p class="text-brand-gray text-sm">Spécialités</p>
            <div class="flex flex-wrap gap-2 mt-1">
                <span class="bg-brand-peach text-brand-burgundy px-3 py-1 rounded-full text-sm">Pâtisserie</span>
                <span class="bg-brand-peach text-brand-burgundy px-3 py-1 rounded-full text-sm">Cuisine asiatique</span>
                <span class="bg-brand-peach text-brand-burgundy px-3 py-1 rounded-full text-sm">Plats végétariens</span>
                <span class="bg-brand-peach text-brand-burgundy px-3 py-1 rounded-full text-sm">Desserts</span>
            </div>
        </div>
    </div>

    <!-- Edit Mode -->
    <form id="edit-profile" class="hidden space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-brand-gray text-sm mb-1" for="last-name">Nom</label>
                <input type="text" id="last-name" value="Alouane" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-brand-burgundy">
            </div>
            <div>
                <label class="block text-brand-gray text-sm mb-1" for="first-name">Prénom</label>
                <input type="text" id="first-name" value="Fatima-Ezzahra" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-brand-burgundy">
            </div>
            <div>
                <label class="block text-brand-gray text-sm mb-1" for="email">Email</label>
                <input type="email" id="email" value="chef.fatimaezzahra@email.com" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-brand-burgundy">
            </div>
            <!-- <div>
                                <label class="block text-brand-gray text-sm mb-1" for="phone">Téléphone</label>
                                <input type="tel" id="phone" value="+33 6 12 34 56 78" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-brand-burgundy">
                            </div> -->
            <!-- <div>
                                <label class="block text-brand-gray text-sm mb-1" for="birthdate">Date de naissance</label>
                                <input type="date" id="birthdate" value="1990-03-15" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-brand-burgundy">
                            </div> -->
            <div>
                <label class="block text-brand-gray text-sm mb-1" for="location">Localisation</label>
                <input type="text" id="location" value="Safi, Maroc" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-brand-burgundy">
            </div>
        </div>
        <div>
            <label class="block text-brand-gray text-sm mb-1" for="about">À propos de moi</label>
            <textarea id="about" rows="4" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-brand-burgundy">Passionnée de cuisine depuis mon plus jeune âge, j'aime particulièrement expérimenter avec les saveurs méditerranéennes et asiatiques. Je partage ici mes recettes.</textarea>
        </div>
        <div>
            <label class="block text-brand-gray text-sm mb-1" for="specialties">Spécialités</label>
            <div class="flex flex-wrap gap-2 mt-1">
                <div class="bg-brand-peach text-brand-burgundy px-3 py-1 rounded-full text-sm flex items-center">
                    Pâtisserie <button type="button" class="ml-2 text-xs">&times;</button>
                </div>
                <div class="bg-brand-peach text-brand-burgundy px-3 py-1 rounded-full text-sm flex items-center">
                    Cuisine asiatique <button type="button" class="ml-2 text-xs">&times;</button>
                </div>
                <div class="bg-brand-peach text-brand-burgundy px-3 py-1 rounded-full text-sm flex items-center">
                    Plats végétariens <button type="button" class="ml-2 text-xs">&times;</button>
                </div>
                <div class="bg-brand-peach text-brand-burgundy px-3 py-1 rounded-full text-sm flex items-center">
                    Desserts <button type="button" class="ml-2 text-xs">&times;</button>
                </div>
                <div class="flex items-center">
                    <input type="text" placeholder="Ajouter une spécialité" class="p-1 border border-gray-300 rounded text-sm focus:outline-none focus:ring-2 focus:ring-brand-burgundy">
                    <button type="button" class="ml-1 text-brand-burgundy"><i class="fas fa-plus"></i></button>
                </div>
            </div>
        </div>
        <div class="flex justify-end space-x-4 pt-4">
            <button type="button" id="cancel-edit" class="px-4 py-2 border border-brand-burgundy text-brand-burgundy rounded hover:bg-brand-peach transition-colors">Annuler</button>
            <button type="submit" class="px-4 py-2 bg-brand-burgundy text-white rounded hover:bg-brand-coral transition-colors">Enregistrer</button>
        </div>
    </form>
</section>