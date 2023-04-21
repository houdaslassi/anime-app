<div class="flex items-center space-x-4 p-4 bg-gray-50 dark:bg-gray-700/50 rounded-lg group" x-data="{ open: false }">
    <div class="flex-shrink-0 w-16 h-20">
        <img 
            src="{{ $watchlist->anime->image_url ?? 'https://via.placeholder.com/300x400.png?text=No+Image' }}" 
            alt="{{ $watchlist->anime->title }}" 
            class="w-full h-full object-cover rounded"
            onerror="this.src='https://via.placeholder.com/300x400.png?text=No+Image'"
        >
    </div>
    
    <div class="flex-grow min-w-0">
        <h3 class="text-lg font-medium text-gray-900 dark:text-white truncate">
            <a href="{{ route('anime.show', $watchlist->anime) }}" class="hover:text-indigo-600 dark:hover:text-indigo-400">
                {{ $watchlist->anime->title }}
            </a>
        </h3>
        <div class="flex items-center mt-1 text-sm text-gray-500 dark:text-gray-400">
            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ 
                $watchlist->status === 'watching' ? 'bg-blue-100 text-blue-800 dark:bg-blue-900/50 dark:text-blue-300' :
                ($watchlist->status === 'completed' ? 'bg-green-100 text-green-800 dark:bg-green-900/50 dark:text-green-300' :
                ($watchlist->status === 'plan_to_watch' ? 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900/50 dark:text-yellow-300' :
                'bg-red-100 text-red-800 dark:bg-red-900/50 dark:text-red-300'))
            }}">
                {{ ucfirst(str_replace('_', ' ', $watchlist->status)) }}
            </span>
            <span class="mx-2">•</span>
            <span>{{ $watchlist->episodes_watched }}/{{ $watchlist->anime->episodes ?? '?' }} eps</span>
        </div>
    </div>
    
    <div class="relative">
        <button 
            @click="open = !open"
            @click.away="open = false"
            class="p-2 text-gray-400 hover:text-gray-500 dark:hover:text-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:focus:ring-indigo-400"
        >
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"/>
            </svg>
        </button>

        <div 
            x-show="open"
            x-transition:enter="transition ease-out duration-100"
            x-transition:enter-start="transform opacity-0 scale-95"
            x-transition:enter-end="transform opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="transform opacity-100 scale-100"
            x-transition:leave-end="transform opacity-0 scale-95"
            class="absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white dark:bg-gray-700 ring-1 ring-black ring-opacity-5 z-50"
            style="display: none;"
        >
            <div class="py-1">
                <!-- Update Status -->
                @foreach(['watching', 'completed', 'plan_to_watch', 'dropped'] as $status)
                    <form action="{{ route('watchlist.update', $watchlist) }}" method="POST" class="block">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="episodes_watched" value="{{ $watchlist->episodes_watched }}">
                        <button 
                            type="submit" 
                            name="status" 
                            value="{{ $status }}"
                            class="w-full text-left px-4 py-2 text-sm {{ $watchlist->status === $status ? 'bg-gray-100 dark:bg-gray-600' : '' }} text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-600"
                        >
                            {{ ucfirst(str_replace('_', ' ', $status)) }}
                        </button>
                    </form>
                @endforeach

                <!-- Update Episodes -->
                <div class="px-4 py-2 border-t border-gray-100 dark:border-gray-600">
                    <form action="{{ route('watchlist.update', $watchlist) }}" method="POST" class="flex items-center space-x-2">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" value="{{ $watchlist->status }}">
                        <input 
                            type="number" 
                            name="episodes_watched"
                            value="{{ $watchlist->episodes_watched }}"
                            min="0"
                            max="{{ $watchlist->anime->episodes }}"
                            class="w-20 px-2 py-1 text-sm border rounded dark:bg-gray-600 dark:border-gray-500 dark:text-gray-300"
                        >
                        <button 
                            type="submit"
                            class="px-3 py-1 text-sm bg-indigo-600 text-white rounded hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:focus:ring-indigo-400"
                        >
                            Update
                        </button>
                    </form>
                </div>

                <!-- Remove from Watchlist -->
                <div class="border-t border-gray-100 dark:border-gray-600">
                    <form action="{{ route('watchlist.destroy', $watchlist) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button 
                            type="submit"
                            class="w-full text-left px-4 py-2 text-sm text-red-600 dark:text-red-400 hover:bg-gray-100 dark:hover:bg-gray-600"
                            onclick="return confirm('Are you sure you want to remove this from your watchlist?')"
                        >
                            Remove from Watchlist
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown-content {
    display: none;
}
</style> 