<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Un Zeste d'Inspiration - Nouveau mot de passe</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="http://parsleyjs.org/dist/parsley.js"></script>
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

<body class="poppins bg-brand-peach min-h-screen flex items-center justify-center">

    <div class="absolute inset-0 bg-cover bg-center blur-sm opacity-70"
        style="background-image: url('https://images.unsplash.com/photo-1504674900247-0877df9cc836');"></div>

    <div class="form-container relative z-10 p-8 rounded-2xl shadow-2xl max-w-md w-full mx-4">
        <div class="text-center mb-6">
            <h2 class="playfair text-3xl font-bold text-brand-burgundy mb-2">Nouveau mot de passe</h2>
            <p class="text-brand-gray">Veuillez définir un nouveau mot de passe pour votre compte.</p>
        </div>

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

        <form method="POST" action="{{ route('password.update') }}" data-parsley-validate>
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="mb-4">
                <label class="block text-brand-gray mb-2">Adresse e-mail</label>
                <input type="email" name="email" value="{{ old('email') }}" required
                    class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-brand-burgundy focus:ring-2 focus:ring-brand-burgundy/20"
                    placeholder="Votre adresse e-mail">
            </div>

            <div class="mb-4">
                <label class="block text-brand-gray mb-2">Nouveau mot de passe</label>
                <input type="password" name="password" required data-parsley-minlength="8"
                    class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-brand-burgundy focus:ring-2 focus:ring-brand-burgundy/20"
                    placeholder="Nouveau mot de passe">
            </div>

            <div class="mb-6">
                <label class="block text-brand-gray mb-2">Confirmer le mot de passe</label>
                <input type="password" name="password_confirmation" required data-parsley-equalto="[name='password']"
                    class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-brand-burgundy focus:ring-2 focus:ring-brand-burgundy/20"
                    placeholder="Confirmez le mot de passe">
            </div>

            <button type="submit"
                class="w-full bg-brand-burgundy text-white py-3 rounded-lg hover:bg-brand-red transition-colors">
                Réinitialiser le mot de passe
            </button>
        </form>

        <div class="mt-6 text-center">
            <a href="{{ route('login') }}" class="text-brand-coral hover:text-brand-red transition-colors">Retour à la connexion</a>
        </div>
    </div>
</body>

</html>