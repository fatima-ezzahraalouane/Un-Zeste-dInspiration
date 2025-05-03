<section id="settings-section" class="bg-white rounded-lg shadow-xl p-6 mb-8 hidden">
    <h2 class="playfair text-2xl font-bold text-brand-burgundy mb-6">Paramètres du compte</h2>

    @if ($errors->any())
    <div id="error-message" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
        <strong class="font-bold">Erreur !</strong>
        <ul class="mt-2 list-disc list-inside text-sm">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- Security Settings -->
    <div>
        <div class="space-y-6">
            <div>
                <form method="POST" action="{{ route('dashboard.update-password') }}" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block text-brand-gray text-sm mb-1" for="current-password">
                            Mot de passe actuel <span class="text-red-500">*</span>
                        </label>
                        <input type="password" name="current_password" id="current-password" placeholder="••••••••" required class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-brand-burgundy">
                    </div>
                    <div>
                        <label class="block text-brand-gray text-sm mb-1" for="new-password">
                            Nouveau mot de passe <span class="text-red-500">*</span>
                        </label>
                        <input type="password" name="new_password" id="new-password" placeholder="••••••••" required class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-brand-burgundy">
                    </div>
                    <div>
                        <label class="block text-brand-gray text-sm mb-1" for="confirm-password">
                            Confirmer le mot de passe <span class="text-red-500">*</span>
                        </label>
                        <input type="password" name="new_password_confirmation" id="confirm-password" placeholder="••••••••" required class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-brand-burgundy">
                    </div>

                    <button type="submit" class="px-4 py-2 bg-brand-burgundy text-white rounded hover:bg-brand-coral transition-colors">
                        Mettre à jour le mot de passe
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>