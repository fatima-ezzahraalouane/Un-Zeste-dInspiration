<section id="stats-section" class="bg-white rounded-lg shadow-xl p-6 mb-8 hidden">
    <h2 class="playfair text-2xl font-bold text-brand-burgundy mb-6">Statistiques Personnelles</h2>

    <!-- Stats Overview -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
        <div class="bg-brand-peach p-4 rounded-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-brand-dark text-sm">Expériences</p>
                    <p class="text-3xl font-bold text-brand-burgundy">{{ $stats['experiences'] }}</p>
                </div>
                <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center text-brand-burgundy">
                    <i class="fas fa-utensils text-xl"></i>
                </div>
            </div>
        </div>
        <div class="bg-brand-peach p-4 rounded-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-brand-dark text-sm">Commentaires</p>
                    <p class="text-3xl font-bold text-brand-burgundy">{{ $stats['comments'] }}</p>
                </div>
                <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center text-brand-burgundy">
                    <i class="fas fa-comment-alt text-xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Most Popular Experiences -->
    <div class="mb-8">
        <h3 class="playfair text-xl font-semibold text-brand-burgundy mb-4">Expériences les plus populaires</h3>
        <div class="overflow-x-auto">
            <table class="min-w-full border-collapse">
                <thead>
                    <tr class="bg-brand-peach">
                        <th class="px-4 py-3 text-left text-sm font-medium text-brand-burgundy">Titre</th>
                        <th class="px-4 py-3 text-center text-sm font-medium text-brand-burgundy">Commentaires</th>
                        <th class="px-4 py-3 text-right text-sm font-medium text-brand-burgundy">Date</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse ($stats['popularExperiences'] as $exp)
                    <tr class="hover:bg-brand-peach/20 transition-colors">
                        <td class="px-4 py-3 text-sm text-brand-dark">{{ $exp->title }}</td>
                        <td class="px-4 py-3 text-sm text-center text-brand-dark">{{ $exp->comments_count }}</td>
                        <td class="px-4 py-3 text-sm text-right text-brand-dark">{{ $exp->created_at->format('d M Y') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="px-4 py-3 text-center text-brand-gray">Aucune expérience populaire.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</section>
