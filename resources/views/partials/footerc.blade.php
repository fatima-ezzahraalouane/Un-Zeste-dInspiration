<footer class="bg-brand-burgundy text-white py-12">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div>
                <h3 class="playfair text-2xl font-bold mb-4">Un Zeste d'Inspiration</h3>
                <p class="text-brand-peach">
                    Votre destination culinaire d'excellence pour découvrir et partager des recettes extraordinaires.
                </p>
            </div>
            <div>
                <h4 class="playfair text-xl font-semibold mb-4">Navigation</h4>
                <ul class="space-y-2">
                    <li><a href="{{ route('gourmand.accueil') }}" class="text-brand-peach hover:text-white transition-colors">Accueil</a></li>
                    <li><a href="{{ route('gourmand.recettes') }}" class="text-brand-peach hover:text-white transition-colors">Recettes</a></li>
                    <li><a href="{{ route('gourmand.blog') }}" class="text-brand-peach hover:text-white transition-colors">Blog</a></li>
                    <li><a href="{{ route('gourmand.mesfavoris') }}" class="text-brand-peach hover:text-white transition-colors">Mes favoris</a></li>
                    <li><a href="{{ route('gourmand.profile') }}" class="text-brand-peach hover:text-white transition-colors">Profil</a></li>
                </ul>
            </div>
            <div>
                <h4 class="playfair text-xl font-semibold mb-4">Suivez-nous</h4>
                <div class="flex space-x-4 mb-6">
                    <a href="#" class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-white/20 transition-all">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-white/20 transition-all">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-white/20 transition-all">
                        <i class="fab fa-pinterest"></i>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-white/20 transition-all">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
                <div class="text-brand-peach">
                    <p class="mb-2">Newsletter culinaire</p>
                    <div class="flex">
                        <input type="email" placeholder="Votre email"
                            class="bg-white/10 rounded-l-full py-2 px-4 focus:outline-none focus:bg-white/20 transition-all flex-grow">
                        <button class="bg-white text-brand-burgundy px-6 rounded-r-full hover:bg-brand-peach transition-all">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="border-t border-white/10 my-12"></div>

        <div class="flex justify-center items-center text-brand-peach text-sm">
            <p>&copy; 2024 Un Zeste d'Inspiration. Tous droits réservés.</p>
        </div>
    </div>
</footer>
