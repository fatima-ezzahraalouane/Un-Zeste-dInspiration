<section id="users-section" class="hidden space-y-6">
    <div class="flex justify-between items-center">
        <h1 class="playfair text-2xl md:text-3xl font-bold text-brand-burgundy">Gestion des Utilisateurs
        </h1>
    </div>

    <!-- Tabs -->
    <div class="flex border-b border-gray-200">
        <button class="px-4 py-2 border-b-2 border-brand-burgundy text-brand-burgundy font-medium">
            Tous les utilisateurs
        </button>
    </div>

    <!-- Users Table -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th
                            class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Utilisateur
                        </th>
                        <th
                            class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Rôle
                        </th>
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
                    @foreach ($users as $user)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-4">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-gray-200 rounded-full overflow-hidden mr-3">
                                    <img src="{{ $chef->user->avatar ?? 'https://img.freepik.com/premium-vector/vector-chef-character-design_746655-2375.jpg?w=740' }}" alt="User" class="w-full h-full object-cover rounded-full border-2 border-brand-coral" />
                                </div>
                                <div>
                                    <div class="font-medium">{{ $user->last_name }} {{ $user->first_name }}</div>
                                    <div class="text-sm text-gray-500">{{ $user->email }}</div>
                                </div>
                            </div>
                        </td>

                        <td class="px-4 py-4 text-sm">
                            {{ $user->role->name_user }}
                        </td>

                        <td class="px-4 py-4 text-sm">
                            {{ optional($user->created_at)->format('d/m/Y') }}
                        </td>

                        <td class="px-4 py-4 text-sm">
                            @if($user->statut === 'Suspendu')
                            <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full text-xs">Suspendu</span>
                            @elseif($user->statut === 'Actif' && $user->is_approved)
                            <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">Actif</span>
                            @else
                            <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full text-xs">En attente</span>
                            @endif
                        </td>

                        <td class="px-4 py-4 text-right text-sm">
                            <div class="flex justify-end space-x-2">
                                @if(!$user->is_approved || $user->statut == 'Suspendu')
                                <!-- Bouton pour Approuver ou Réactiver -->
                                <form action="{{ route('admin.users.approve', $user) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button class="text-brand-burgundy hover:text-brand-red" title="Approuver / Réactiver">
                                        <i class="fas fa-check"></i>
                                    </button>
                                </form>
                                @endif

                                @if($user->statut != 'Suspendu')
                                <!-- Bouton pour Suspendre -->
                                <form action="{{ route('admin.users.suspend', $user) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button class="text-brand-burgundy hover:text-brand-red" title="Suspendre">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </form>
                                @endif

                                <!-- Bouton pour Supprimer (toujours présent) -->
                                <form action="{{ route('admin.users.delete', $user) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-brand-burgundy hover:text-brand-red" title="Supprimer">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- Pagination -->
        <div class="px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
            <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                <div>
                    <p class="text-sm text-gray-700">
                        Affichage de
                        <span class="font-medium">{{ $users->firstItem() }}</span>
                        à
                        <span class="font-medium">{{ $users->lastItem() }}</span>
                        sur
                        <span class="font-medium">{{ $users->total() }}</span> résultats
                    </p>
                </div>
                <div>
                    <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                        <!-- Previous Page Link -->
                        @if ($users->onFirstPage())
                        <span
                            class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-400">
                            <i class="fas fa-chevron-left"></i>
                        </span>
                        @else
                        <a href="{{ $users->previousPageUrl() }}"
                            class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                        @endif

                        @foreach ($users->getUrlRange(1, $users->lastPage()) as $page => $url)
                        @if ($page == $users->currentPage())
                        <span
                            class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-brand-burgundy text-sm font-medium text-white">
                            {{ $page }}
                        </span>
                        @else
                        <a href="{{ $url }}"
                            class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                            {{ $page }}
                        </a>
                        @endif
                        @endforeach

                        <!-- Next Page Link -->
                        @if ($users->hasMorePages())
                        <a href="{{ $users->nextPageUrl() }}"
                            class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                        @else
                        <span
                            class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-400">
                            <i class="fas fa-chevron-right"></i>
                        </span>
                        @endif
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>