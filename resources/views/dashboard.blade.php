<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Currently Watching Section -->
            <section class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Currently Watching</h2>
                    @if($watchingAnimes->isNotEmpty())
                        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
                            @foreach($watchingAnimes as $anime)
                                <a href="{{ route('anime.show', $anime) }}" class="block group">
                                    <div class="relative aspect-[3/4] rounded-lg overflow-hidden bg-gray-200 dark:bg-gray-700">
                                        <img 
                                            src="{{ $anime->image_url ?? 'https://via.placeholder.com/300x400.png?text=No+Image' }}" 
                                            alt="{{ $anime->title }}"
                                            class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-200"
                                            onerror="this.src='https://via.placeholder.com/300x400.png?text=No+Image'"
                                        >
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/0 to-transparent">
                                            <div class="absolute bottom-0 left-0 right-0 p-3">
                                                <h3 class="text-white text-sm font-medium line-clamp-2">{{ $anime->title }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-500 dark:text-gray-400">You're not watching any anime yet.</p>
                    @endif
                </div>
            </section>

            <!-- Recent Anime Section -->
            <section class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Recent Anime</h2>
                        <a href="#" class="text-sm text-indigo-600 hover:text-indigo-500 dark:text-indigo-400 dark:hover:text-indigo-300">
                            View All →
                        </a>
                    </div>
                    <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
                        @foreach($recentAnimes as $anime)
                            <a href="{{ route('anime.show', $anime) }}" class="block group">
                                <div class="relative aspect-[3/4] rounded-lg overflow-hidden bg-gray-200 dark:bg-gray-700">
                                    <img 
                                        src="{{ $anime->image_url ?? 'https://via.placeholder.com/300x400.png?text=No+Image' }}" 
                                        alt="{{ $anime->title }}"
                                        class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-200"
                                        onerror="this.src='https://via.placeholder.com/300x400.png?text=No+Image'"
                                    >
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/0 to-transparent">
                                        <div class="absolute bottom-0 left-0 right-0 p-3">
                                            <h3 class="text-white text-sm font-medium line-clamp-2">{{ $anime->title }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </section>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- My Watchlist Section -->
                <section class="lg:col-span-2 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-xl font-semibold text-gray-900 dark:text-white">My Watchlist</h2>
                            <a href="#" class="text-sm text-indigo-600 hover:text-indigo-500 dark:text-indigo-400 dark:hover:text-indigo-300">
                                View All →
                            </a>
                        </div>
                        <div class="space-y-3">
                            @forelse($watchlist as $item)
                                @include('components.watchlist-item', ['watchlist' => $item])
                            @empty
                                <p class="text-gray-500 dark:text-gray-400">Your watchlist is empty.</p>
                            @endforelse
                        </div>
                    </div>
                </section>

                <!-- Quick Stats Section -->
                <section class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Quick Stats</h2>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="bg-blue-50 dark:bg-blue-900/20 p-4 rounded-lg">
                                <p class="text-sm text-blue-600 dark:text-blue-400 mb-1">Watching</p>
                                <p class="text-2xl font-semibold text-blue-900 dark:text-blue-200">
                                    {{ $watchlist->where('status', 'watching')->count() }}
                                </p>
                            </div>
                            <div class="bg-green-50 dark:bg-green-900/20 p-4 rounded-lg">
                                <p class="text-sm text-green-600 dark:text-green-400 mb-1">Completed</p>
                                <p class="text-2xl font-semibold text-green-900 dark:text-green-200">
                                    {{ $watchlist->where('status', 'completed')->count() }}
                                </p>
                            </div>
                            <div class="bg-yellow-50 dark:bg-yellow-900/20 p-4 rounded-lg">
                                <p class="text-sm text-yellow-600 dark:text-yellow-400 mb-1">Plan to Watch</p>
                                <p class="text-2xl font-semibold text-yellow-900 dark:text-yellow-200">
                                    {{ $watchlist->where('status', 'plan_to_watch')->count() }}
                                </p>
                            </div>
                            <div class="bg-red-50 dark:bg-red-900/20 p-4 rounded-lg">
                                <p class="text-sm text-red-600 dark:text-red-400 mb-1">Dropped</p>
                                <p class="text-2xl font-semibold text-red-900 dark:text-red-200">
                                    {{ $watchlist->where('status', 'dropped')->count() }}
                                </p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
