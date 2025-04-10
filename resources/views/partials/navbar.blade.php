<nav class="fixed w-full bg-white/90 backdrop-blur-md shadow-sm z-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center h-20">
                <a href="#" class="flex items-center space-x-2">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-18 w-24">
                    <span class="playfair text-2xl font-bold text-brand-burgundy">
                        Un Zeste d'Inspiration
                    </span>
                </a>

                <div class="hidden md:flex items-center space-x-5">
                    <a href="{{ route('login') }}" class="px-6 py-2 text-brand-burgundy border-2 border-brand-burgundy rounded-full hover:bg-brand-burgundy hover:text-white transition-all">
                        Connexion
                    </a>
                    <a href="{{ route('register') }}" class="shine-effect px-6 py-2 bg-brand-burgundy text-white rounded-full hover:shadow-lg transform hover:scale-105 transition-all duration-300">
                        Inscription
                    </a>
                </div>

                <button id="burger-menu" class="md:hidden text-brand-burgundy">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-white shadow-lg rounded-lg mt-2 mx-4 p-4 mb-4">
            <a href="{{ route('login') }}" class="block text-center px-6 py-2 text-brand-burgundy border-2 border-brand-burgundy rounded-full hover:bg-brand-burgundy hover:text-white transition-all">
                Connexion
            </a>
            <a href="{{ route('register') }}"
                class="block text-center shine-effect px-6 py-2 bg-brand-burgundy text-white rounded-full mt-4 hover:shadow-lg transform hover:scale-105 transition-all duration-300">
                Inscription
            </a>
        </div>
    </nav>