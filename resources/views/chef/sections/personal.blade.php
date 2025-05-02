<section id="personal-section" class="bg-white rounded-lg p-6 mb-8 shadow-xl">

    @if (session('success'))
    <div id="success-alert" class="flex justify-end">
        <div
            class="mt-2 fixed top-20 right-4 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded shadow-md">
            <i class="fas fa-check-circle"></i>
            {{ session('success') }}
        </div>
    </div>
    @endif

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
                <p class="font-medium">{{ $chef->user->last_name }}</p>
            </div>
            <div>
                <p class="text-brand-gray text-sm">Prénom</p>
                <p class="font-medium">{{ $chef->user->first_name }}</p>
            </div>
            <div>
                <p class="text-brand-gray text-sm">Email</p>
                <p class="font-medium">{{ $chef->user->email }}</p>
            </div>
            <div>
                <p class="text-brand-gray text-sm">Localisation</p>
                <p class="font-medium">{{ $chef->adresse ?? 'Non renseignée' }}</p>
            </div>
        </div>
        <div>
            <p class="text-brand-gray text-sm">À propos de moi</p>
            <p class="font-medium">{{ $chef->biographie ?? 'Aucune biographie disponible.' }}</p>
        </div>
        <div>
            <p class="text-brand-gray text-sm">Spécialités</p>
            <div class="flex flex-wrap gap-2 mt-1">
                @if (!empty($chef->specialite))
                @foreach (explode(',', $chef->specialite) as $specialite)
                <span class="bg-brand-peach text-brand-burgundy px-3 py-1 rounded-full text-sm">
                    {{ trim($specialite) }}
                </span>
                @endforeach
                @else
                <p class="text-sm text-brand-gray italic">Aucune spécialité renseignée.</p>
                @endif
            </div>
        </div>
    </div>

    <!-- Edit Mode -->
    <form id="edit-profile" class="hidden space-y-6" method="POST" action="{{ route('chef.dashboard.update') }}">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-brand-gray text-sm mb-1" for="last-name">Nom</label>
                <input type="text" id="last-name" name="last_name" value="{{ $chef->user->last_name }}"
                    class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-brand-burgundy">
            </div>
            <div>
                <label class="block text-brand-gray text-sm mb-1" for="first-name">Prénom</label>
                <input type="text" id="first-name" name="first_name" value="{{ $chef->user->first_name }}"
                    class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-brand-burgundy">
            </div>
            <div>
                <label class="block text-brand-gray text-sm mb-1" for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ $chef->user->email }}"
                    class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-brand-burgundy">
            </div>
            <div>
                <label class="block text-brand-gray text-sm mb-1" for="location">Localisation</label>
                <input type="text" id="adresse" name="adresse" value="{{ $chef->adresse }}"
                    class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-brand-burgundy">
            </div>
            <div>
                <label class="block text-brand-gray text-sm mb-1" for="avatar">URL de la photo de profil</label>
                <input type="url" name="avatar" id="avatar" value="{{ old('avatar', $chef->user->avatar) }}"
                    class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-brand-burgundy">
            </div>
        </div>
        <div>
            <label class="block text-brand-gray text-sm mb-1" for="about">À propos de moi</label>
            <textarea id="biographie" name="biographie" rows="4"
                class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-brand-burgundy">{{ $chef->biographie }}</textarea>
        </div>
        <!-- SPECIALITES -->
        <div>
            <label class="block text-brand-gray text-sm mb-1">Spécialités</label>

            <!-- Zone affichage dynamique des spécialités -->
            <div id="specialties-list" class="flex flex-wrap gap-2 mt-1">
                @php
                $specialites = $chef->specialite ? explode(',', $chef->specialite) : [];
                @endphp

                @foreach ($specialites as $specialite)
                <div class="chip bg-brand-peach text-brand-burgundy px-3 py-1 rounded-full text-sm flex items-center">
                    {{ trim($specialite) }}
                    <button type="button" class="ml-2 text-xs remove-specialty">&times;</button>
                </div>
                @endforeach
            </div>

            <!-- Zone d'ajout -->
            <div class="flex items-center mt-2">
                <input type="text" id="specialty-input" placeholder="Ajouter une spécialité"
                    class="p-1 border border-gray-300 rounded text-sm focus:outline-none focus:ring-2 focus:ring-brand-burgundy">
                <button type="button" id="add-specialty-btn" class="ml-1 text-brand-burgundy"><i class="fas fa-plus"></i></button>
            </div>

            <!-- Champ caché pour soumettre les spécialités -->
            <input type="hidden" name="specialite" id="specialties-hidden" value="{{ implode(',', $specialites) }}">
        </div>

        <div class="flex justify-end space-x-4 pt-4">
            <button type="button" id="cancel-edit"
            class="px-4 py-2 border border-brand-burgundy text-brand-burgundy rounded hover:bg-brand-peach transition-colors">Annuler</button>
            <button type="submit"
            class="px-4 py-2 bg-brand-burgundy text-white rounded hover:bg-brand-coral transition-colors">Enregistrer</button>
        </div>
    </form>
</section>