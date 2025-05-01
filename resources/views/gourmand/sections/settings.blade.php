<section id="settings-section" class="bg-white rounded-lg shadow-xl p-6 mb-8 hidden">
    <h2 class="playfair text-2xl font-bold text-brand-burgundy mb-6">Paramètres du compte</h2>

    <!-- Security Settings -->
    <div>
        <h3 class="playfair text-xl font-semibold text-brand-burgundy mb-4">Sécurité</h3>
        <div class="space-y-6">
            <div>
                <h4 class="font-medium text-brand-dark mb-3">Changer de mot de passe</h4>
                <form class="space-y-4">
                    <div>
                        <label class="block text-brand-gray text-sm mb-1" for="current-password">Mot de passe actuel</label>
                        <input type="password" id="current-password" placeholder="••••••••" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-brand-burgundy">
                    </div>
                    <div>
                        <label class="block text-brand-gray text-sm mb-1" for="new-password">Nouveau mot de passe</label>
                        <input type="password" id="new-password" placeholder="••••••••" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-brand-burgundy">
                    </div>
                    <div>
                        <label class="block text-brand-gray text-sm mb-1" for="confirm-password">Confirmer le mot de passe</label>
                        <input type="password" id="confirm-password" placeholder="••••••••" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-brand-burgundy">
                    </div>
                    <button type="submit" class="px-4 py-2 bg-brand-burgundy text-white rounded hover:bg-brand-coral transition-colors">Mettre à jour le mot de passe</button>
                </form>
            </div>
        </div>
    </div>
</section>