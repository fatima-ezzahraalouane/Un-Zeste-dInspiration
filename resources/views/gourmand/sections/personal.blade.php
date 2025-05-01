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
                <p class="font-medium">{{ $gourmand->user->last_name }}</p>
            </div>
            <div>
                <p class="text-brand-gray text-sm">Prénom</p>
                <p class="font-medium">{{ $gourmand->user->first_name }}</p>
            </div>
            <div>
                <p class="text-brand-gray text-sm">Email</p>
                <p class="font-medium">{{ $gourmand->user->email }}</p>
            </div>
            <div>
                <p class="text-brand-gray text-sm">Localisation</p>
                <p class="font-medium">{{ $gourmand->adresse ?? 'Non renseignée' }}</p>
            </div>
        </div>
        <div>
            <p class="text-brand-gray text-sm">À propos de moi</p>
            <p class="font-medium">{{ $gourmand->biographie ?? 'Aucune biographie disponible.' }}</p>
        </div>
    </div>

    <!-- Edit Mode -->
    <form id="edit-profile" class="hidden space-y-6" method="POST" action="{{ route('gourmand.profile.update') }}">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-brand-gray text-sm mb-1" for="last-name">Nom</label>
                <input type="text" id="last-name" name="last_name" value="{{ $gourmand->user->last_name }}"
                    class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-brand-burgundy">
            </div>
            <div>
                <label class="block text-brand-gray text-sm mb-1" for="first-name">Prénom</label>
                <input type="text" id="first-name" name="first_name" value="{{ $gourmand->user->first_name }}"
                    class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-brand-burgundy">
            </div>
            <div>
                <label class="block text-brand-gray text-sm mb-1" for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ $gourmand->user->email }}"
                    class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-brand-burgundy">
            </div>
            <div>
                <label class="block text-brand-gray text-sm mb-1" for="adresse">Localisation</label>
                <input type="text" id="adresse" name="adresse" value="{{ $gourmand->adresse }}"
                    class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-brand-burgundy">
            </div>
        </div>
        <div>
            <label class="block text-brand-gray text-sm mb-1" for="biographie">À propos de moi</label>
            <textarea id="biographie" name="biographie" rows="4"
                class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-brand-burgundy">{{ $gourmand->biographie }}</textarea>
        </div>
        <div class="flex justify-end space-x-4 pt-4">
            <button type="button" id="cancel-edit" class="px-4 py-2 border border-brand-burgundy text-brand-burgundy rounded hover:bg-brand-peach transition-colors">Annuler</button>
            <button type="submit" class="px-4 py-2 bg-brand-burgundy text-white rounded hover:bg-brand-coral transition-colors">Enregistrer</button>
        </div>
    </form>
</section>
