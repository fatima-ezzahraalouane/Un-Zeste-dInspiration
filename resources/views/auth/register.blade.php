<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Un Zeste d'Inspiration - Inscription</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'brand-burgundy': '#793E37',
                        'brand-red': '#974344',
                        'brand-coral': '#B55D51',
                        'brand-peach': '#FFF0ED',
                        'brand-dark': '#4C4C4C',
                        'brand-gray': '#878787',
                    }
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Poppins:wght@300;400;500;600&display=swap');

        .playfair {
            font-family: 'Playfair Display', serif;
        }

        .poppins {
            font-family: 'Poppins', sans-serif;
        }

        .form-container {
            background: rgba(255, 240, 237, 0.95);
            backdrop-filter: blur(10px);
        }
    </style>
</head>

<body class="poppins bg-brand-peach">
    <!-- Navbar -->
    <nav class="fixed w-full bg-white/90 backdrop-blur-md shadow-sm z-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center h-20">
                <a href="#" class="flex items-center space-x-2">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-18 w-24">
                    <span class="playfair text-2xl font-bold text-brand-burgundy">
                        Un Zeste d'Inspiration
                    </span>
                </a>
            </div>
        </div>
    </nav>

    <!-- Signup Section -->
    <section class="relative min-h-screen flex items-center justify-center bg-brand-peach">
        <div class="absolute inset-0 bg-cover bg-center blur-sm opacity-70"
            style="background-image: url('https://images.unsplash.com/photo-1504674900247-0877df9cc836');"></div>

        <div class="relative z-10 mt-28 mb-8 form-container rounded-2xl shadow-2xl p-8 max-w-md w-full mx-4">
            <div class="text-center mb-6">
                <h2 class="playfair text-3xl font-bold text-brand-burgundy mb-2">Inscription</h2>
                <p class="text-brand-gray">Créez votre compte et rejoignez notre communauté culinaire.</p>
            </div>
            <form action="{{ route('register') }}" method="POST" class="space-y-6" data-parsley-validate>
                @csrf

                @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <span onclick="this.parentElement.remove()" class="absolute top-0 right-0 px-4 py-3 cursor-pointer">&times;</span>
                </div>
                @endif

                @if(session('success'))
                <div id="popup-success" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                    {{ session('success') }}
                    <span onclick="document.getElementById('popup-success').remove()" class="absolute top-0 right-0 px-4 py-3 cursor-pointer">&times;</span>
                </div>
                @endif

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-brand-gray mb-2">Prénom</label>
                        <input type="text" name="first_name"
                            class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-brand-burgundy focus:ring-2 focus:ring-brand-burgundy/20"
                            placeholder="Votre prénom"
                            required data-parsley-minlength="2"
                            data-parsley-pattern="^[A-Za-zÀ-ÿ\s\-]+$"
                            data-parsley-pattern-message="Le prénom ne peut contenir que des lettres et des tirets">
                    </div>
                    <div>
                        <label class="block text-brand-gray mb-2">Nom</label>
                        <input type="text" name="last_name"
                            class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-brand-burgundy focus:ring-2 focus:ring-brand-burgundy/20"
                            placeholder="Votre nom"
                            required data-parsley-minlength="2"
                            data-parsley-pattern="^[A-Za-zÀ-ÿ\s\-]+$"
                            data-parsley-pattern-message="Le nom ne peut contenir que des lettres et des tirets">
                    </div>
                </div>

                <div>
                    <label class="block text-brand-gray mb-2">Email</label>
                    <input type="email" name="email"
                        class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-brand-burgundy focus:ring-2 focus:ring-brand-burgundy/20"
                        placeholder="Votre adresse e-mail"
                        required data-parsley-type="email"
                        data-parsley-pattern="^[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
                        data-parsley-type-message="Veuillez entrer un email valide">
                </div>

                <div>
                    <label class="block text-brand-gray mb-2">Mot de passe</label>
                    <input type="password" name="password"
                        class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-brand-burgundy focus:ring-2 focus:ring-brand-burgundy/20"
                        placeholder="Votre mot de passe"
                        required data-parsley-minlength="8"
                        data-parsley-pattern="^(?=.*[a-zA-Z])(?=.*\d)(?=.*[@#$%^&+=!]).{6,}$"
                        data-parsley-required-message="Le mot de passe est requis"
                        data-parsley-minlength-message="Le mot de passe doit contenir au moins 8 caractères"
                        data-parsley-pattern-message="Le mot de passe doit contenir au moins une lettre, un chiffre et un symbole">
                </div>

                <div>
                    <label class="block text-brand-gray mb-2">Confirmer le mot de passe</label>
                    <input type="password" name="password_confirmation"
                        class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-brand-burgundy focus:ring-2 focus:ring-brand-burgundy/20"
                        placeholder="Confirmez votre mot de passe" required data-parsley-equalto="[name='password']">
                </div>

                <div>
                    <label class="block text-brand-gray mb-2">Rôle</label>
                    <select name="role" class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-brand-burgundy focus:ring-2 focus:ring-brand-burgundy/20" required>
                        <option value="">Sélectionnez un rôle</option>
                        <option value="Gourmand">Gourmand</option>
                        <option value="Chef">Chef</option>
                    </select>
                </div>

                <button type="submit"
                    class="w-full bg-brand-burgundy text-white py-3 rounded-lg hover:bg-brand-red transition-colors">
                    S'inscrire
                </button>
            </form>

            <div class="mt-6 text-center">
                <p class="text-brand-gray">Déjà membre ?</p>
                <a href="{{ route('login') }}" class="text-brand-coral hover:text-brand-red transition-colors">Se connecter</a>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        window.ParsleyConfig = {
            errorsWrapper: '<div class="text-sm text-red-500 mt-1"></div>',
            errorTemplate: '<div></div>',
            errorClass: 'border-red-500 ring-1 ring-red-300',
            successClass: 'border-green-500 ring-1 ring-green-300'
        };
    </script>

    <script src="https://cdn.jsdelivr.net/npm/parsleyjs@2/dist/parsley.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/parsleyjs@2/dist/i18n/fr.js"></script>

    <script>
        window.Parsley.setLocale('fr');
    </script>
</body>

</html>