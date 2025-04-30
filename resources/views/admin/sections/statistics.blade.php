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
                    <h3 class="text-3xl font-bold text-brand-dark mt-2">{{ $stats['recipes'] }}</h3>
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
                    <h3 class="text-3xl font-bold text-brand-dark mt-2">{{ $stats['experiences'] }}</h3>
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
                    <h3 class="text-3xl font-bold text-brand-dark mt-2">{{ $stats['chefs'] }}</h3>
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
                    <h3 class="text-3xl font-bold text-brand-dark mt-2">{{ $stats['gourmands'] }}</h3>
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
        <!-- <div class="bg-white rounded-xl shadow-md p-6">
            <h3 class="playfair text-xl font-bold text-brand-burgundy mb-4">Distribution par Catégorie</h3>
            <div class="h-64 relative">
                <canvas id="categoryChart"></canvas>
            </div>
            <div class="mt-4 grid grid-cols-2 gap-2">
                @foreach($categories as $index => $category)
                <div class="flex items-center">
                    <span class="w-3 h-3 rounded-full mr-2"
                        style="background-color: {{ ['#793E37', '#B55D51', '#974344', '#4C4C4C'][$index % 4] }};">
                    </span>
                    <span class="text-sm">
                        {{ $category->name }} ({{ $category->recipes_count }})
                    </span>
                </div>
                @endforeach
            </div>
        </div> -->

        <!-- Top 3 Gourmands les plus actifs -->
        <div class="bg-white rounded-xl shadow-md p-6">
            <h3 class="playfair text-xl font-bold text-brand-burgundy mb-4">Top 3 Gourmands les plus actifs</h3>
            <div class="space-y-4">
                @foreach($topGourmands as $index => $gourmand)
                <div class="flex items-center p-3 {{ $index == 0 ? 'bg-brand-peach/70' : 'bg-gray-100' }} rounded-lg">
                    <div class="w-12 h-12 bg-gray-200 rounded-full overflow-hidden mr-4">
                        <img src="{{ $gourmand->user->avatar ?? 'https://atomic.site/wp-content/uploads/2019/02/Avatar.png' }}"
                            alt="Chef" class="w-full h-full object-cover rounded-full border-2 border-brand-coral" />
                    </div>
                    <div class="flex-1">
                        <h4 class="font-semibold">{{ $gourmand->user->first_name ?? 'Gourmand' }} {{ $gourmand->user->last_name ?? '' }}</h4>
                        <p class="text-sm text-brand-gray">{{ $gourmand->approved_experiences_count }} recettes publiées</p>
                    </div>
                    <div class="
                        @if($index == 0) bg-brand-burgundy 
                        @elseif($index == 1) bg-brand-coral 
                        @else bg-brand-red 
                        @endif
                        text-white px-3 py-1 rounded-full text-sm">
                        {{ $index + 1 }}<sup>{{ $index == 0 ? 'er' : 'e' }}</sup>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Top 3 Chefs les plus actifs -->
        <div class="bg-white rounded-xl shadow-md p-6">
            <h3 class="playfair text-xl font-bold text-brand-burgundy mb-4">Top 3 Chefs les plus actifs</h3>
            <div class="space-y-4">
                @foreach($topChefs as $index => $chef)
                <div class="flex items-center p-3 {{ $index == 0 ? 'bg-brand-peach/70' : 'bg-gray-100' }} rounded-lg">
                    <div class="w-12 h-12 bg-gray-200 rounded-full overflow-hidden mr-4">
                        <img src="{{ $chef->user->avatar ?? 'https://img.freepik.com/premium-vector/vector-chef-character-design_746655-2375.jpg?w=740' }}"
                            alt="Chef" class="w-full h-full object-cover rounded-full border-2 border-brand-coral" />
                    </div>
                    <div class="flex-1">
                        <h4 class="font-semibold">{{ $chef->user->last_name ?? 'Chef' }} {{ $chef->user->first_name ?? '' }}</h4>
                        <p class="text-sm text-brand-gray">{{ $chef->approved_recipes_count }} recettes publiées</p>
                    </div>
                    <div class="
                        @if($index == 0) bg-brand-burgundy 
                        @elseif($index == 1) bg-brand-coral 
                        @else bg-brand-red 
                        @endif
                        text-white px-3 py-1 rounded-full text-sm">
                        {{ $index + 1 }}<sup>{{ $index == 0 ? 'er' : 'e' }}</sup>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
