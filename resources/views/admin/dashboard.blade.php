<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <title>Un Zeste d'Inspiration - Dashboard Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
                        primary: '#793E37',
                        secondary: '#974344',
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

        .dashboard-tab {
            transition: all 0.3s ease;
        }

        .dashboard-tab.active {
            background-color: #FFF0ED;
            color: #793E37;
            border-left: 4px solid #793E37;
        }

        .shine-effect {
            position: relative;
            overflow: hidden;
        }

        .shine-effect::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(to bottom right,
                    rgba(255, 255, 255, 0) 0%,
                    rgba(255, 255, 255, 0.1) 50%,
                    rgba(255, 255, 255, 0) 100%);
            transform: rotate(45deg);
            animation: shine 3s infinite;
        }

        @keyframes shine {
            0% {
                transform: translateX(-100%) rotate(45deg);
            }

            100% {
                transform: translateX(100%) rotate(45deg);
            }
        }
    </style>
</head>

<body class="bg-gray-50 poppins">
    <!-- Navbar -->
    <nav class="fixed w-full bg-white/90 backdrop-blur-md shadow-sm z-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center h-20">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-2">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-18 w-24">
                    <!-- <span class="playfair text-2xl font-bold text-brand-burgundy">
                        Un Zeste d'Inspiration
                    </span> -->
                </a>

                <div class="hidden md:flex items-center space-x-8">
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
        <div id="mobile-menu" class="hidden md:hidden bg-white shadow-md rounded-lg mt-2 mx-4 mb-4">
            <div class="flex flex-col px-4 py-2 space-y-2">
                <a href="registre.html"
                    class="shine-effect px-6 py-2 bg-brand-burgundy text-white rounded-full hover:shadow-lg transform hover:scale-105 transition-all duration-300">
                    Déconnexion
                </a>
            </div>
        </div>
    </nav>

    <!-- Dashboard Container -->
    <div class="flex flex-col md:flex-row pt-20 min-h-screen">
        <!-- Sidebar -->
        <aside class="w-full md:w-64 bg-white shadow-md md:min-h-screen">
            <div class="p-4">
                <h2 class="playfair text-xl font-bold text-brand-burgundy mb-6">Dashboard Admin</h2>
                <div class="space-y-2">
                    <button id="btn-statistics"
                        class="dashboard-tab active w-full text-left px-4 py-3 rounded flex items-center space-x-3 hover:bg-brand-peach/50">
                        <i class="fas fa-chart-pie text-lg"></i>
                        <span>Statistiques</span>
                    </button>
                    <button id="btn-users"
                        class="dashboard-tab w-full text-left px-4 py-3 rounded flex items-center space-x-3 hover:bg-brand-peach/50">
                        <i class="fas fa-users text-lg"></i>
                        <span>Gestion Utilisateurs</span>
                    </button>
                    <button id="btn-content"
                        class="dashboard-tab w-full text-left px-4 py-3 rounded flex items-center space-x-3 hover:bg-brand-peach/50">
                        <i class="fas fa-utensils text-lg"></i>
                        <span>Modération Contenu</span>
                    </button>
                    <button id="btn-categories"
                        class="dashboard-tab w-full text-left px-4 py-3 rounded flex items-center space-x-3 hover:bg-brand-peach/50">
                        <i class="fas fa-tags text-lg"></i>
                        <span>Catégories & Tags</span>
                    </button>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-4 md:p-8">
            <!-- Statistics Section -->
            <section id="statistics-section" class="space-y-6">
                <div class="flex justify-between items-center">
                    <h1 class="playfair text-2xl md:text-3xl font-bold text-brand-burgundy">Statistiques Globales</h1>
                </div>

                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-brand-burgundy">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-brand-gray">Total Recettes</p>
                                <h3 class="text-3xl font-bold text-brand-dark mt-2">246</h3>
                            </div>
                            <div class="bg-brand-peach/30 p-3 rounded-full">
                                <i class="fas fa-utensils text-brand-burgundy text-xl"></i>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-brand-burgundy">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-brand-gray">Expériences Culinaires</p>
                                <h3 class="text-3xl font-bold text-brand-dark mt-2">84</h3>
                            </div>
                            <div class="bg-brand-peach/30 p-3 rounded-full">
                                <i class="fas fa-cookie-bite text-brand-burgundy text-xl"></i>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-brand-burgundy">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-brand-gray">Total Chefs</p>
                                <h3 class="text-3xl font-bold text-brand-dark mt-2">53</h3>
                            </div>
                            <div class="bg-brand-peach/30 p-3 rounded-full">
                                <i class="fas fa-users text-brand-burgundy text-xl"></i>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-brand-burgundy">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-brand-gray">Total Clients</p>
                                <h3 class="text-3xl font-bold text-brand-dark mt-2">80</h3>
                            </div>
                            <div class="bg-brand-peach/30 p-3 rounded-full">
                                <i class="fas fa-users text-brand-burgundy text-xl"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Charts Section -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Distribution par catégorie -->
                    <div class="bg-white rounded-xl shadow-md p-6">
                        <h3 class="playfair text-xl font-bold text-brand-burgundy mb-4">Distribution par Catégorie</h3>
                        <div class="h-64 relative">
                            <canvas id="categoryChart"></canvas>
                        </div>
                        <div class="mt-4 grid grid-cols-2 gap-2">
                            <div class="flex items-center">
                                <span class="w-3 h-3 rounded-full bg-brand-burgundy mr-2"></span>
                                <span class="text-sm">Plats Principaux (76)</span>
                            </div>
                            <div class="flex items-center">
                                <span class="w-3 h-3 rounded-full bg-brand-coral mr-2"></span>
                                <span class="text-sm">Desserts (69)</span>
                            </div>
                            <div class="flex items-center">
                                <span class="w-3 h-3 rounded-full bg-brand-red mr-2"></span>
                                <span class="text-sm">Entrées (54)</span>
                            </div>
                            <div class="flex items-center">
                                <span class="w-3 h-3 rounded-full bg-brand-dark mr-2"></span>
                                <span class="text-sm">Boissons (47)</span>
                            </div>
                        </div>
                    </div>

                    <!-- Top 3 Chefs les plus actifs -->
                    <div class="bg-white rounded-xl shadow-md p-6">
                        <h3 class="playfair text-xl font-bold text-brand-burgundy mb-4">Top 3 Chefs les plus actifs</h3>
                        <div class="space-y-4">
                            <div class="flex items-center p-3 bg-brand-peach/70 rounded-lg">
                                <div class="w-12 h-12 bg-gray-200 rounded-full overflow-hidden mr-4">
                                    <img src="../profilCV.jpg" alt="Chef" class="w-full h-full object-cover" />
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-semibold">Fatima-Ezzahra Alouane</h4>
                                    <p class="text-sm text-brand-gray">32 recettes publiées</p>
                                </div>
                                <div class="bg-brand-burgundy text-white px-3 py-1 rounded-full text-sm">
                                    1<sup>er</sup>
                                </div>
                            </div>

                            <div class="flex items-center p-3 bg-gray-100 rounded-lg">
                                <div class="w-12 h-12 bg-gray-200 rounded-full overflow-hidden mr-4">
                                    <img src="../profilCV.jpg" alt="Chef" class="w-full h-full object-cover" />
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-semibold">Fatima Alouane</h4>
                                    <p class="text-sm text-brand-gray">28 recettes publiées</p>
                                </div>
                                <div class="bg-brand-coral text-white px-3 py-1 rounded-full text-sm">
                                    2<sup>e</sup>
                                </div>
                            </div>

                            <div class="flex items-center p-3 bg-gray-100 rounded-lg">
                                <div class="w-12 h-12 bg-gray-200 rounded-full overflow-hidden mr-4">
                                    <img src="../profilCV.jpg" alt="Chef" class="w-full h-full object-cover" />
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-semibold">Fatima</h4>
                                    <p class="text-sm text-brand-gray">24 recettes publiées</p>
                                </div>
                                <div class="bg-brand-red text-white px-3 py-1 rounded-full text-sm">
                                    3<sup>e</sup>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Activity -->
                <!-- <div class="bg-white rounded-xl shadow-md p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="playfair text-xl font-bold text-brand-burgundy">Activité Récente</h3>
                        <a href="#" class="text-brand-burgundy hover:underline text-sm">Voir tout</a>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full">
                            <thead>
                                <tr class="border-b">
                                    <th class="text-left py-3 px-2">Utilisateur</th>
                                    <th class="text-left py-3 px-2">Action</th>
                                    <th class="text-left py-3 px-2">Date</th>
                                    <th class="text-left py-3 px-2">Statut</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="py-3 px-2">
                                        <div class="flex items-center">
                                            <div class="w-8 h-8 bg-gray-200 rounded-full overflow-hidden mr-3">
                                                <img src="/api/placeholder/30/30" alt="User" />
                                            </div>
                                            <span>Sophie Durand</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-2">Nouvelle recette ajoutée</td>
                                    <td class="py-3 px-2">Aujourd'hui, 14:35</td>
                                    <td class="py-3 px-2">
                                        <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full text-xs">En
                                            attente</span>
                                    </td>
                                </tr>
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="py-3 px-2">
                                        <div class="flex items-center">
                                            <div class="w-8 h-8 bg-gray-200 rounded-full overflow-hidden mr-3">
                                                <img src="/api/placeholder/30/30" alt="User" />
                                            </div>
                                            <span>Jean Petit</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-2">Inscription chef</td>
                                    <td class="py-3 px-2">Aujourd'hui, 11:20</td>
                                    <td class="py-3 px-2">
                                        <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full text-xs">À
                                            valider</span>
                                    </td>
                                </tr>
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="py-3 px-2">
                                        <div class="flex items-center">
                                            <div class="w-8 h-8 bg-gray-200 rounded-full overflow-hidden mr-3">
                                                <img src="/api/placeholder/30/30" alt="User" />
                                            </div>
                                            <span>Marie Lambert</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-2">Expérience culinaire ajoutée</td>
                                    <td class="py-3 px-2">Hier, 16:42</td>
                                    <td class="py-3 px-2">
                                        <span
                                            class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">Approuvé</span>
                                    </td>
                                </tr>
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="py-3 px-2">
                                        <div class="flex items-center">
                                            <div class="w-8 h-8 bg-gray-200 rounded-full overflow-hidden mr-3">
                                                <img src="/api/placeholder/30/30" alt="User" />
                                            </div>
                                            <span>Pierre Dubois</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-2">Modification recette</td>
                                    <td class="py-3 px-2">Hier, 10:15</td>
                                    <td class="py-3 px-2">
                                        <span
                                            class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">Approuvé</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div> -->
            </section>

            <!-- User Management Section (hidden by default) -->
            <section id="users-section" class="hidden space-y-6">
                <div class="flex justify-between items-center">
                    <h1 class="playfair text-2xl md:text-3xl font-bold text-brand-burgundy">Gestion des Utilisateurs
                    </h1>
                    <!-- <div class="flex space-x-3">
                        <button
                            class="bg-brand-burgundy text-white px-4 py-2 rounded-lg hover:bg-brand-red transition-all">
                            <i class="fas fa-plus mr-2"></i>Ajouter
                        </button>
                        <button
                            class="bg-brand-peach text-brand-burgundy px-4 py-2 rounded-lg hover:bg-brand-burgundy hover:text-white transition-all">
                            <i class="fas fa-download mr-2"></i>Exporter
                        </button>
                    </div> -->
                </div>

                <!-- Tabs -->
                <div class="flex border-b border-gray-200">
                    <button class="px-4 py-2 border-b-2 border-brand-burgundy text-brand-burgundy font-medium">
                        Tous les utilisateurs
                    </button>
                    <!-- <button class="px-4 py-2 text-gray-500 hover:text-brand-burgundy">
                        Chefs en attente
                    </button>
                    <button class="px-4 py-2 text-gray-500 hover:text-brand-burgundy">
                        Chefs validés
                    </button>
                    <button class="px-4 py-2 text-gray-500 hover:text-brand-burgundy">
                        Clients
                    </button> -->
                </div>

                <!-- Filters and Search -->
                <!-- <div class="flex flex-col md:flex-row justify-between space-y-3 md:space-y-0">
                    <div class="relative">
                        <input type="text" placeholder="Rechercher un utilisateur..."
                            class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand-burgundy focus:border-transparent w-full md:w-80">
                        <span class="absolute left-3 top-2.5 text-gray-400">
                            <i class="fas fa-search"></i>
                        </span>
                    </div>
                    <div class="flex space-x-3">
                        <select
                            class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand-burgundy">
                            <option>Tous les statuts</option>
                            <option>Actif</option>
                            <option>Suspendu</option>
                            <option>En attente</option>
                        </select>
                        <select
                            class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand-burgundy">
                            <option>Filtrer par date</option>
                            <option>Plus récent</option>
                            <option>Plus ancien</option>
                        </select>
                    </div>
                </div> -->

                <!-- Users Table -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="min-w-full">
                            <thead class="bg-gray-50">
                                <tr>
                                    <!-- <th
                                        class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <input type="checkbox"
                                            class="rounded text-brand-burgundy focus:ring-brand-burgundy">
                                    </th> -->
                                    <th
                                        class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Utilisateur
                                    </th>
                                    <th
                                        class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Rôle
                                    </th>
                                    <!-- <th
                                        class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Recettes
                                    </th> -->
                                    <th
                                        class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Date inscription
                                    </th>
                                    <th
                                        class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Statut
                                    </th>
                                    <th
                                        class="px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                <tr class="hover:bg-gray-50">
                                    <!-- <td class="px-4 py-4">
                                        <input type="checkbox"
                                            class="rounded text-brand-burgundy focus:ring-brand-burgundy">
                                    </td> -->
                                    <td class="px-4 py-4">
                                        <div class="flex items-center">
                                            <div class="w-10 h-10 bg-gray-200 rounded-full overflow-hidden mr-3">
                                                <img src="../profilCV.jpg" alt="User"
                                                    class="w-full h-full object-cover" />
                                            </div>
                                            <div>
                                                <div class="font-medium">Fatima-Ezzahra Alouane</div>
                                                <div class="text-sm text-gray-500">fatima@gmail.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-4 text-sm">
                                        Chef
                                    </td>
                                    <!-- <td class="px-4 py-4 text-sm">
                                        32
                                    </td> -->
                                    <td class="px-4 py-4 text-sm">
                                        12/01/2025
                                    </td>
                                    <td class="px-4 py-4 text-sm">
                                        <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">
                                            Actif
                                        </span>
                                    </td>
                                    <td class="px-4 py-4 text-right text-sm">
                                        <div class="flex justify-end space-x-2">
                                            <!-- <button class="text-brand-burgundy hover:text-brand-red">
                                                <i class="fas fa-eye"></i>
                                            </button> -->
                                            <!-- <button class="text-brand-burgundy hover:text-brand-red">
                                                <i class="fas fa-edit"></i>
                                            </button> -->
                                            <button class="text-brand-burgundy hover:text-brand-red">
                                                <i class="fas fa-check"></i>
                                            </button>
                                            <button class="text-brand-burgundy hover:text-brand-red">
                                                <i class="fas fa-times"></i>
                                            </button>
                                            <button class="text-brand-burgundy hover:text-brand-red">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-50">
                                    <!-- <td class="px-4 py-4">
                                        <input type="checkbox"
                                            class="rounded text-brand-burgundy focus:ring-brand-burgundy">
                                    </td> -->
                                    <td class="px-4 py-4">
                                        <div class="flex items-center">
                                            <div class="w-10 h-10 bg-gray-200 rounded-full overflow-hidden mr-3">
                                                <img src="../profilCV.jpg" alt="User"
                                                    class="w-full h-full object-cover" />
                                            </div>
                                            <div>
                                                <div class="font-medium">Moi</div>
                                                <div class="text-sm text-gray-500">moi@email.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-4 text-sm">
                                        Chef
                                    </td>
                                    <!-- <td class="px-4 py-4 text-sm">
                                        0
                                    </td> -->
                                    <td class="px-4 py-4 text-sm">
                                        20/03/2025
                                    </td>
                                    <td class="px-4 py-4 text-sm">
                                        <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full text-xs">
                                            En attente
                                        </span>
                                    </td>
                                    <td class="px-4 py-4 text-right text-sm">
                                        <div class="flex justify-end space-x-2">
                                            <button class="text-brand-burgundy hover:text-brand-red">
                                                <i class="fas fa-check"></i>
                                            </button>
                                            <button class="text-brand-burgundy hover:text-brand-red">
                                                <i class="fas fa-times"></i>
                                            </button>
                                            <button class="text-brand-burgundy hover:text-brand-red">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-50">
                                    <!-- <td class="px-4 py-4">
                                        <input type="checkbox"
                                            class="rounded text-brand-burgundy focus:ring-brand-burgundy">
                                    </td> -->
                                    <td class="px-4 py-4">
                                        <div class="flex items-center">
                                            <div class="w-10 h-10 bg-gray-200 rounded-full overflow-hidden mr-3">
                                                <img src="../profilCV.jpg" alt="User"
                                                    class="w-full h-full object-cover" />
                                            </div>
                                            <div>
                                                <div class="font-medium">Fatii</div>
                                                <div class="text-sm text-gray-500">fatii@email.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-4 text-sm">
                                        Client
                                    </td>
                                    <!-- <td class="px-4 py-4 text-sm">
                                        -
                                    </td> -->
                                    <td class="px-4 py-4 text-sm">
                                        15/02/2025
                                    </td>
                                    <td class="px-4 py-4 text-sm">
                                        <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">
                                            Actif
                                        </span>
                                    </td>
                                    <td class="px-4 py-4 text-right text-sm">
                                        <div class="flex justify-end space-x-2">
                                            <button class="text-brand-burgundy hover:text-brand-red">
                                                <i class="fas fa-check"></i>
                                            </button>
                                            <button class="text-brand-burgundy hover:text-brand-red">
                                                <i class="fas fa-times"></i>
                                            </button>
                                            <button class="text-brand-burgundy hover:text-brand-red">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-50">
                                    <!-- <td class="px-4 py-4">
                                        <input type="checkbox"
                                            class="rounded text-brand-burgundy focus:ring-brand-burgundy">
                                    </td> -->
                                    <td class="px-4 py-4">
                                        <div class="flex items-center">
                                            <div class="w-10 h-10 bg-gray-200 rounded-full overflow-hidden mr-3">
                                                <img src="../profilCV.jpg" alt="User"
                                                    class="w-full h-full object-cover" />
                                            </div>
                                            <div>
                                                <div class="font-medium">Fatima</div>
                                                <div class="text-sm text-gray-500">fatima@email.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-4 text-sm">
                                        Chef
                                    </td>
                                    <!-- <td class="px-4 py-4 text-sm">
                                        28
                                    </td> -->
                                    <td class="px-4 py-4 text-sm">
                                        05/01/2025
                                    </td>
                                    <td class="px-4 py-4 text-sm">
                                        <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">
                                            Actif
                                        </span>
                                    </td>
                                    <td class="px-4 py-4 text-right text-sm">
                                        <div class="flex justify-end space-x-2">
                                            <button class="text-brand-burgundy hover:text-brand-red">
                                                <i class="fas fa-check"></i>
                                            </button>
                                            <button class="text-brand-burgundy hover:text-brand-red">
                                                <i class="fas fa-times"></i>
                                            </button>
                                            <button class="text-brand-burgundy hover:text-brand-red">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- Pagination -->
                    <div class="px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
                        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                            <div>
                                <p class="text-sm text-gray-700">
                                    Affichage de <span class="font-medium">1</span> à <span
                                        class="font-medium">10</span> sur <span class="font-medium">97</span> résultats
                                </p>
                            </div>
                            <div>
                                <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px"
                                    aria-label="Pagination">
                                    <a href="#"
                                        class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                        <i class="fas fa-chevron-left"></i>
                                    </a>
                                    <a href="#"
                                        class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                                        1
                                    </a>
                                    <a href="#"
                                        class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-brand-burgundy text-sm font-medium text-white">
                                        2
                                    </a>
                                    <a href="#"
                                        class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                                        3
                                    </a>
                                    <span
                                        class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700">
                                        ...
                                    </span>
                                    <a href="#"
                                        class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                                        10
                                    </a>
                                    <a href="#"
                                        class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                        <i class="fas fa-chevron-right"></i>
                                    </a>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Content Moderation Section (hidden by default) -->
            <section id="content-section" class="hidden space-y-6">
                <div class="flex justify-between items-center">
                    <h1 class="playfair text-2xl md:text-3xl font-bold text-brand-burgundy">Modération de Contenu</h1>
                    <div class="flex space-x-3">
                        <!-- <button
                            class="bg-brand-peach text-brand-burgundy px-4 py-2 rounded-lg hover:bg-brand-burgundy hover:text-white transition-all">
                            <i class="fas fa-filter mr-2"></i>Filtres
                        </button> -->
                    </div>
                </div>

                <!-- Tabs -->
                <div class="flex border-b border-gray-200">
                    <button class="px-4 py-2 border-b-2 border-brand-burgundy text-brand-burgundy font-medium">
                        En attente
                    </button>
                    <button class="px-4 py-2 text-gray-500 hover:text-brand-burgundy">
                        Approuvés
                    </button>
                    <button class="px-4 py-2 text-gray-500 hover:text-brand-burgundy">
                        Rejetés
                    </button>
                    <!-- <button class="px-4 py-2 text-gray-500 hover:text-brand-burgundy">
                        Signalés
                    </button> -->
                </div>

                <!-- Search and Filters -->
                <!-- <div class="flex flex-col md:flex-row justify-between space-y-3 md:space-y-0">
                    <div class="relative">
                        <input type="text" placeholder="Rechercher une recette..."
                            class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand-burgundy focus:border-transparent w-full md:w-80">
                        <span class="absolute left-3 top-2.5 text-gray-400">
                            <i class="fas fa-search"></i>
                        </span>
                    </div>
                    <div class="flex space-x-3">
                        <select
                            class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand-burgundy">
                            <option>Toutes les catégories</option>
                            <option>Plats Principaux</option>
                            <option>Desserts</option>
                            <option>Entrées</option>
                            <option>Boissons</option>
                        </select>
                        <select
                            class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand-burgundy">
                            <option>Type de contenu</option>
                            <option>Recettes</option>
                            <option>Expériences culinaires</option>
                        </select>
                    </div>
                </div> -->

                <!-- Content Moderation Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Recipe Card 1 -->
                    <div class="bg-white rounded-xl shadow-md overflow-hidden">
                        <div class="h-48 overflow-hidden">
                            <img src="https://www.herta.fr/sites/default/files/styles/scale_crop_720_500/public/2023-04/Small_FR_herta_1220_Tarte%20Tatin%20pate%20brisee_301.jpg.webp?itok=MuMP3o74" alt="Recipe" class="w-full h-full object-cover" />
                        </div>
                        <div class="p-4">
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="playfair text-lg font-bold text-brand-burgundy">Tarte Tatin aux Pommes</h3>
                                <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full text-xs">
                                    En attente
                                </span>
                            </div>
                            <p class="text-sm text-gray-600 mb-3">Soumis par <span class="font-medium">Fatima-Ezzahra
                                </span></p>
                            <div class="flex justify-between items-center mb-3">
                                <div class="text-sm text-gray-500">
                                    <i class="fas fa-utensils mr-1"></i> Dessert
                                </div>
                                <div class="text-sm text-gray-500">
                                    <i class="fas fa-clock mr-1"></i> 20 Mars 2025
                                </div>
                            </div>
                            <div class="flex space-x-2">
                                <button
                                    class="flex-1 bg-brand-burgundy text-white py-2 rounded-lg hover:bg-brand-red transition-all">
                                    <i class="fas fa-check mr-1"></i> Approuver
                                </button>
                                <button
                                    class="flex-1 bg-gray-200 text-gray-700 py-2 rounded-lg hover:bg-gray-300 transition-all">
                                    <i class="fas fa-times mr-1"></i> Rejeter
                                </button>
                                <!-- <button
                                    class="px-3 py-2 bg-brand-peach text-brand-burgundy rounded-lg hover:bg-brand-burgundy hover:text-white transition-all">
                                    <i class="fas fa-eye"></i>
                                </button> -->
                            </div>
                        </div>
                    </div>

                    <!-- Recipe Card 2 -->
                    <div class="bg-white rounded-xl shadow-md overflow-hidden">
                        <div class="h-48 overflow-hidden">
                            <img src="https://img.passeportsante.net/1200x675/2021-03-29/i101004-.webp" alt="Recipe" class="w-full h-full object-cover" />
                        </div>
                        <div class="p-4">
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="playfair text-lg font-bold text-brand-burgundy">Risotto aux Champignons</h3>
                                <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full text-xs">
                                    En attente
                                </span>
                            </div>
                            <p class="text-sm text-gray-600 mb-3">Soumis par <span class="font-medium">Fatima
                                </span></p>
                            <div class="flex justify-between items-center mb-3">
                                <div class="text-sm text-gray-500">
                                    <i class="fas fa-utensils mr-1"></i> Plat Principal
                                </div>
                                <div class="text-sm text-gray-500">
                                    <i class="fas fa-clock mr-1"></i> 19 Mars 2025
                                </div>
                            </div>
                            <div class="flex space-x-2">
                                <button
                                    class="flex-1 bg-brand-burgundy text-white py-2 rounded-lg hover:bg-brand-red transition-all">
                                    <i class="fas fa-check mr-1"></i> Approuver
                                </button>
                                <button
                                    class="flex-1 bg-gray-200 text-gray-700 py-2 rounded-lg hover:bg-gray-300 transition-all">
                                    <i class="fas fa-times mr-1"></i> Rejeter
                                </button>
                                <!-- <button
                                    class="px-3 py-2 bg-brand-peach text-brand-burgundy rounded-lg hover:bg-brand-burgundy hover:text-white transition-all">
                                    <i class="fas fa-eye"></i>
                                </button> -->
                            </div>
                        </div>
                    </div>

                    <!-- Experience Card -->
                    <div class="bg-white rounded-xl shadow-md overflow-hidden">
                        <div class="h-48 overflow-hidden">
                            <img src="https://galet-plage.fr/wp-content/uploads/2024/10/guide_patisseries_nice_6984.jpg" alt="Experience" class="w-full h-full object-cover" />
                        </div>
                        <div class="p-4">
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="playfair text-lg font-bold text-brand-burgundy">Atelier Pâtisserie Française
                                </h3>
                                <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full text-xs">
                                    En attente
                                </span>
                            </div>
                            <p class="text-sm text-gray-600 mb-3">Soumis par <span class="font-medium">Fatima</span>
                            </p>
                            <div class="flex justify-between items-center mb-3">
                                <div class="text-sm text-gray-500">
                                    <i class="fas fa-cookie-bite mr-1"></i> Expérience
                                </div>
                                <div class="text-sm text-gray-500">
                                    <i class="fas fa-clock mr-1"></i> 18 Mars 2025
                                </div>
                            </div>
                            <div class="flex space-x-2">
                                <button
                                    class="flex-1 bg-brand-burgundy text-white py-2 rounded-lg hover:bg-brand-red transition-all">
                                    <i class="fas fa-check mr-1"></i> Approuver
                                </button>
                                <button
                                    class="flex-1 bg-gray-200 text-gray-700 py-2 rounded-lg hover:bg-gray-300 transition-all">
                                    <i class="fas fa-times mr-1"></i> Rejeter
                                </button>
                                <!-- <button
                                    class="px-3 py-2 bg-brand-peach text-brand-burgundy rounded-lg hover:bg-brand-burgundy hover:text-white transition-all">
                                    <i class="fas fa-eye"></i>
                                </button> -->
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pagination -->
                <div class="flex justify-center mt-6">
                    <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                        <a href="#"
                            class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                        <a href="#"
                            class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-brand-burgundy text-sm font-medium text-white">
                            1
                        </a>
                        <a href="#"
                            class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                            2
                        </a>
                        <a href="#"
                            class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                            3
                        </a>
                        <a href="#"
                            class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </nav>
                </div>
            </section>

            <!-- Categories & Tags Section (hidden by default) -->
            <section id="categories-section" class="hidden space-y-6">
                <div class="flex justify-between items-center">
                    <h1 class="playfair text-2xl md:text-3xl font-bold text-brand-burgundy">Catégories & Tags</h1>
                    <!-- <div class="flex space-x-3">
                        <button
                            class="bg-brand-burgundy text-white px-4 py-2 rounded-lg hover:bg-brand-red transition-all">
                            <i class="fas fa-plus mr-2"></i>Ajouter
                        </button>
                    </div> -->
                </div>

                <!-- Tabs -->
                <div class="flex border-b border-gray-200">
                    <button class="px-4 py-2 border-b-2 border-brand-burgundy text-brand-burgundy font-medium">
                        Catégories
                    </button>
                    <button class="px-4 py-2 text-gray-500 hover:text-brand-burgundy">
                        Tags
                    </button>
                    <button class="px-4 py-2 text-gray-500 hover:text-brand-burgundy">
                        Thèmes
                    </button>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Categories Management -->
                    <div class="md:col-span-2">
                        <div class="bg-white rounded-xl shadow-md p-6">
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-lg font-bold text-brand-burgundy">Liste des Catégories</h3>
                                <!-- <div class="relative">
                                    <input type="text" placeholder="Rechercher..."
                                        class="pl-8 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand-burgundy focus:border-transparent w-64">
                                    <span class="absolute left-2 top-2.5 text-gray-400">
                                        <i class="fas fa-search"></i>
                                    </span>
                                </div> -->
                            </div>
                            <div class="overflow-x-auto">
                                <table class="min-w-full">
                                    <thead>
                                        <tr class="border-b">
                                            <th class="text-left py-3 px-2">Nom</th>
                                            <th class="text-left py-3 px-2">Nb. Recettes</th>
                                            <!-- <th class="text-left py-3 px-2">Statut</th> -->
                                            <th class="text-left py-3 px-2">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="border-b hover:bg-gray-50">
                                            <td class="py-3 px-2">Plats Principaux</td>
                                            <td class="py-3 px-2">76</td>
                                            <!-- <td class="py-3 px-2">
                                                <span
                                                    class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">Actif</span>
                                            </td> -->
                                            <td class="py-3 px-2">
                                                <div class="flex space-x-2">
                                                    <button class="text-brand-burgundy hover:text-brand-red">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button class="text-brand-burgundy hover:text-brand-red">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="border-b hover:bg-gray-50">
                                            <td class="py-3 px-2">Desserts</td>
                                            <td class="py-3 px-2">69</td>
                                            <!-- <td class="py-3 px-2">
                                                <span
                                                    class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">Actif</span>
                                            </td> -->
                                            <td class="py-3 px-2">
                                                <div class="flex space-x-2">
                                                    <button class="text-brand-burgundy hover:text-brand-red">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button class="text-brand-burgundy hover:text-brand-red">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="border-b hover:bg-gray-50">
                                            <td class="py-3 px-2">Entrées</td>
                                            <td class="py-3 px-2">54</td>
                                            <!-- <td class="py-3 px-2">
                                                <span
                                                    class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">Actif</span>
                                            </td> -->
                                            <td class="py-3 px-2">
                                                <div class="flex space-x-2">
                                                    <button class="text-brand-burgundy hover:text-brand-red">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button class="text-brand-burgundy hover:text-brand-red">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="border-b hover:bg-gray-50">
                                            <td class="py-3 px-2">Boissons</td>
                                            <td class="py-3 px-2">47</td>
                                            <!-- <td class="py-3 px-2">
                                                <span
                                                    class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">Actif</span>
                                            </td> -->
                                            <td class="py-3 px-2">
                                                <div class="flex space-x-2">
                                                    <button class="text-brand-burgundy hover:text-brand-red">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button class="text-brand-burgundy hover:text-brand-red">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="border-b hover:bg-gray-50">
                                            <td class="py-3 px-2">Pâtisserie</td>
                                            <td class="py-3 px-2">38</td>
                                            <!-- <td class="py-3 px-2">
                                                <span
                                                    class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">Actif</span>
                                            </td> -->
                                            <td class="py-3 px-2">
                                                <div class="flex space-x-2">
                                                    <button class="text-brand-burgundy hover:text-brand-red">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button class="text-brand-burgundy hover:text-brand-red">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Add/Edit Category -->
                    <div>
                        <div class="bg-white rounded-xl shadow-md p-6">
                            <h3 class="text-lg font-bold text-brand-burgundy mb-4">Ajouter une Catégorie</h3>
                            <form class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Nom de la
                                        Catégorie</label>
                                    <input type="text" placeholder="Ex: Cuisine Méditerranéenne"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand-burgundy focus:border-transparent">
                                </div>
                                <!-- <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                                    <textarea rows="3" placeholder="Décrivez brièvement cette catégorie..."
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand-burgundy focus:border-transparent"></textarea>
                                </div> -->
                                <!-- <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Statut</label>
                                    <div class="flex items-center">
                                        <label class="inline-flex items-center mr-6">
                                            <input type="radio"
                                                class="rounded-full text-brand-burgundy focus:ring-brand-burgundy"
                                                name="status" checked>
                                            <span class="ml-2">Actif</span>
                                        </label>
                                        <label class="inline-flex items-center">
                                            <input type="radio"
                                                class="rounded-full text-brand-burgundy focus:ring-brand-burgundy"
                                                name="status">
                                            <span class="ml-2">Inactif</span>
                                        </label>
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Icône</label>
                                    <div class="flex space-x-2">
                                        <button type="button"
                                            class="p-2 border border-gray-300 rounded-lg hover:bg-gray-100">
                                            <i class="fas fa-utensils"></i>
                                        </button>
                                        <button type="button"
                                            class="p-2 border border-gray-300 rounded-lg hover:bg-gray-100">
                                            <i class="fas fa-cookie-bite"></i>
                                        </button>
                                        <button type="button"
                                            class="p-2 border border-gray-300 rounded-lg hover:bg-gray-100">
                                            <i class="fas fa-wine-glass-alt"></i>
                                        </button>
                                        <button type="button"
                                            class="p-2 border border-gray-300 rounded-lg hover:bg-gray-100">
                                            <i class="fas fa-bread-slice"></i>
                                        </button>
                                        <button type="button"
                                            class="p-2 border border-gray-300 rounded-lg hover:bg-gray-100">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div> -->
                                <div class="flex justify-end pt-2">
                                    <button type="submit"
                                        class="bg-brand-burgundy text-white px-6 py-2 rounded-lg hover:bg-brand-red transition-all">
                                        <i class="fas fa-save mr-2"></i>Enregistrer
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Tags Management (initialement caché) -->
                <div id="tags-management" class="hidden grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Liste des Tags -->
                    <div class="md:col-span-2">
                        <div class="bg-white rounded-xl shadow-md p-6">
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-lg font-bold text-brand-burgundy">Liste des Tags</h3>
                                <!-- <div class="relative">
                                    <input type="text" placeholder="Rechercher un tag..."
                                        class="pl-8 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand-burgundy focus:border-transparent w-64">
                                    <span class="absolute left-2 top-2.5 text-gray-400">
                                        <i class="fas fa-search"></i>
                                    </span>
                                </div> -->
                            </div>
                            <!-- <div class="flex flex-wrap gap-2 mb-4">
                                <span
                                    class="px-3 py-1 bg-brand-peach text-brand-burgundy rounded-full text-sm flex items-center">
                                    #Végétarien
                                    <button class="ml-2 text-xs hover:text-brand-red"><i
                                            class="fas fa-times"></i></button>
                                </span>
                                <span
                                    class="px-3 py-1 bg-brand-peach text-brand-burgundy rounded-full text-sm flex items-center">
                                    #SansGluten
                                    <button class="ml-2 text-xs hover:text-brand-red"><i
                                            class="fas fa-times"></i></button>
                                </span>
                                <span
                                    class="px-3 py-1 bg-brand-peach text-brand-burgundy rounded-full text-sm flex items-center">
                                    #Rapide
                                    <button class="ml-2 text-xs hover:text-brand-red"><i
                                            class="fas fa-times"></i></button>
                                </span>
                            </div> -->
                            <table class="min-w-full">
                                <thead>
                                    <tr class="border-b">
                                        <th class="text-left py-3 px-2">Tag</th>
                                        <!-- <th class="text-left py-3 px-2">Utilisations</th> -->
                                        <!-- <th class="text-left py-3 px-2">Statut</th> -->
                                        <th class="text-left py-3 px-2">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Lignes de tags similaires aux catégories -->
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Ajouter/Éditer Tag -->
                    <div>
                        <div class="bg-white rounded-xl shadow-md p-6">
                            <h3 class="text-lg font-bold text-brand-burgundy mb-4">Ajouter un Tag</h3>
                            <form class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Nom du Tag</label>
                                    <input type="text" placeholder="Ex: SansGluten"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand-burgundy focus:border-transparent">
                                </div>
                                <!-- <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Type</label>
                                    <select
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand-burgundy">
                                        <option>Régime alimentaire</option>
                                        <option>Temps de préparation</option>
                                        <option>Niveau de difficulté</option>
                                        <option>Occasion</option>
                                    </select>
                                </div> -->
                                <button type="submit"
                                    class="w-full bg-brand-burgundy text-white px-6 py-2 rounded-lg hover:bg-brand-red transition-all">
                                    <i class="fas fa-plus mr-2"></i>Ajouter le Tag
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Themes Management (initialement caché) -->
                <div id="themes-management" class="hidden grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Liste des Thèmes -->
                    <div class="md:col-span-2">
                        <div class="bg-white rounded-xl shadow-md p-6">
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-lg font-bold text-brand-burgundy">Thèmes Culinaires</h3>
                                <!-- <div class="relative">
                                    <input type="text" placeholder="Rechercher un thème..."
                                        class="pl-8 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand-burgundy focus:border-transparent w-64">
                                    <span class="absolute left-2 top-2.5 text-gray-400">
                                        <i class="fas fa-search"></i>
                                    </span>
                                </div> -->
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                                <div class="p-4 border rounded-lg hover:bg-brand-peach/20 transition-all">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <h4 class="font-medium">Cuisine Méditerranéenne</h4>
                                            <p class="text-sm text-gray-600">42 expériences associées</p>
                                        </div>
                                        <div class="flex space-x-2">
                                            <button class="text-brand-burgundy hover:text-brand-red">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="text-brand-burgundy hover:text-brand-red">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-4 border rounded-lg hover:bg-brand-peach/20 transition-all">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <h4 class="font-medium">Cuisine Asiatique</h4>
                                            <p class="text-sm text-gray-600">38 expériences associées</p>
                                        </div>
                                        <div class="flex space-x-2">
                                            <button class="text-brand-burgundy hover:text-brand-red">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="text-brand-burgundy hover:text-brand-red">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!-- ... autres thèmes ... -->
                            </div>
                        </div>
                    </div>

                    <!-- Ajouter/Éditer Thème -->
                    <div>
                        <div class="bg-white rounded-xl shadow-md p-6">
                            <h3 class="text-lg font-bold text-brand-burgundy mb-4">Ajouter un Thème</h3>
                            <form class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Nom du Thème</label>
                                    <input type="text" placeholder="Ex: Cuisine Française"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand-burgundy focus:border-transparent">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                                    <textarea rows="3" placeholder="Décrivez ce thème culinaire..."
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand-burgundy focus:border-transparent"></textarea>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Image de
                                        couverture</label>
                                    <input type="text" placeholder="Url de l'image"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand-burgundy focus:border-transparent">
                                </div>
                                <button type="submit"
                                    class="w-full bg-brand-burgundy text-white px-6 py-2 rounded-lg hover:bg-brand-red transition-all">
                                    <i class="fas fa-plus mr-2"></i>Créer le Thème
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <!-- Scripts -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        // Initialize AOS
        AOS.init();

        // Mobile menu toggle
        const burgerMenu = document.getElementById('burger-menu');
        const mobileMenu = document.getElementById('mobile-menu');

        burgerMenu.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        // Dashboard tabs functionality
        const tabs = {
            statistics: {
                btn: document.getElementById('btn-statistics'),
                section: document.getElementById('statistics-section')
            },
            users: {
                btn: document.getElementById('btn-users'),
                section: document.getElementById('users-section')
            },
            content: {
                btn: document.getElementById('btn-content'),
                section: document.getElementById('content-section')
            },
            categories: {
                btn: document.getElementById('btn-categories'),
                section: document.getElementById('categories-section')
            }
        };

        function switchTab(tabName) {
            // Remove active class from all tabs and hide all sections
            Object.values(tabs).forEach(tab => {
                tab.btn.classList.remove('active');
                tab.section.classList.add('hidden');
            });

            // Activate selected tab and show its section
            tabs[tabName].btn.classList.add('active');
            tabs[tabName].section.classList.remove('hidden');
        }

        // Add click event listeners to all tab buttons
        Object.entries(tabs).forEach(([name, tab]) => {
            tab.btn.addEventListener('click', () => switchTab(name));
        });
    </script>
    <script>
        const categoryTabs = document.querySelectorAll('.flex.border-b.border-gray-200 button');
        const categoryContent = document.querySelector('.grid.grid-cols-1.md\\:grid-cols-3.gap-6');
        const tagsManagement = document.getElementById('tags-management');
        const themesManagement = document.getElementById('themes-management');
        categoryTabs.forEach(tab => {
            tab.addEventListener('click', () => {
                // Remove active state from all tabs
                categoryTabs.forEach(t => {
                    t.classList.remove('border-b-2', 'border-brand-burgundy', 'text-brand-burgundy');
                    t.classList.add('text-gray-500');
                });

                // Add active state to clicked tab
                tab.classList.remove('text-gray-500');
                tab.classList.add('border-b-2', 'border-brand-burgundy', 'text-brand-burgundy');

                // Show/hide appropriate content
                if (tab.textContent.trim() === 'Catégories') {
                    categoryContent.classList.remove('hidden');
                    tagsManagement.classList.add('hidden');
                    themesManagement.classList.add('hidden');
                } else if (tab.textContent.trim() === 'Tags') {
                    categoryContent.classList.add('hidden');
                    tagsManagement.classList.remove('hidden');
                    themesManagement.classList.add('hidden');
                } else if (tab.textContent.trim() === 'Thèmes') {
                    categoryContent.classList.add('hidden');
                    tagsManagement.classList.add('hidden');
                    themesManagement.classList.remove('hidden');
                }
            });
        });
    </script>
    <script>
        // Configuration du graphique des catégories
        const ctx = document.getElementById('categoryChart').getContext('2d');
        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Plats Principaux', 'Desserts', 'Entrées', 'Boissons'],
                datasets: [{
                    data: [76, 69, 54, 47],
                    backgroundColor: [
                        '#793E37', // brand-burgundy
                        '#B55D51', // brand-coral
                        '#974344', // brand-red
                        '#4C4C4C' // brand-dark
                    ],
                    borderWidth: 0,
                    hoverOffset: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                const label = context.label || '';
                                const value = context.parsed || 0;
                                const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                const percentage = Math.round((value * 100) / total);
                                return `${label}: ${value} (${percentage}%)`;
                            }
                        }
                    }
                },
                cutout: '70%'
            }
        });
    </script>
</body>

</html>