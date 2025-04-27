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