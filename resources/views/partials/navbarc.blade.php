<nav class="fixed w-full bg-white/90 backdrop-blur-md shadow-sm z-50">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex justify-between items-center h-20">
            <a href="{{ route('gourmand.accueil') }}" class="flex items-center space-x-2">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-18 w-24">
                <!-- <span class="playfair text-2xl font-bold text-brand-burgundy">
                    Un Zeste d'Inspiration
                </span> -->
            </a>

            <div class="hidden md:flex items-center space-x-8">
                <a href="{{ route('gourmand.accueil') }}" class="text-brand-dark hover:text-brand-coral transition-colors">Accueil</a>
                <a href="{{ route('gourmand.recettes') }}" class="text-brand-dark hover:text-brand-coral transition-colors">Recettes</a>
                <a href="{{ route('gourmand.blog') }}" class="text-brand-dark hover:text-brand-coral transition-colors">Blog</a>
                <a href="{{ route('gourmand.mesfavoris') }}" class="text-brand-dark hover:text-brand-coral transition-colors">Mes Favoris</a>
                <a href="{{ route('gourmand.profil') }}" class="text-brand-dark hover:text-brand-coral transition-colors">Profil</a>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit"
                        class="shine-effect px-6 py-2 bg-brand-burgundy text-white rounded-full hover:shadow-lg transform hover:scale-105 transition-all duration-300">
                        Déconnexion
                    </button>
                </form>

            </div>

            <button id="burger-menu" class="md:hidden text-brand-burgundy">
                <i class="fas fa-bars text-2xl"></i>
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden bg-white shadow-lg rounded-lg mt-2 mx-4 p-4 mb-4">
        <a href="{{ route('gourmand.accueil') }}" class="block text-brand-dark hover:text-brand-coral transition-colors mb-2">Accueil</a>
        <a href="{{ route('gourmand.recettes') }}" class="block text-brand-dark hover:text-brand-coral transition-colors mb-2">Recettes</a>
        <a href="{{ route('gourmand.blog') }}" class="block text-brand-dark hover:text-brand-coral transition-colors mb-2">Blog</a>
        <a href="{{ route('gourmand.mesfavoris') }}" class="block text-brand-dark hover:text-brand-coral transition-colors mb-2">Mes Favoris</a>
        <a href="{{ route('gourmand.profil') }}" class="block text-brand-dark hover:text-brand-coral transition-colors mb-2">Profil</a>
        <form action="{{ route('logout') }}" method="POST" class="inline">
            @csrf
            <button type="submit"
                class="shine-effect px-6 py-2 bg-brand-burgundy text-white rounded-full mt-4 hover:shadow-lg transform hover:scale-105 transition-all duration-300">
                Déconnexion
            </button>
        </form>
    </div>
</nav>