@props(['watchlist'])

<div class="flex items-center space-x-4 p-4 bg-white rounded-lg shadow-sm hover:bg-gray-50 transition-colors duration-200">
    <div class="flex-shrink-0 w-16 h-16 relative">
        @if($watchlist->anime->cover_image)
            <img src="{{ $watchlist->anime->cover_image }}" alt="{{ $watchlist->anime->title }}" class="w-full h-full object-cover rounded">
        @else
            <div class="w-full h-full bg-gray-200 rounded flex items-center justify-center">
                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </div>
        @endif
    </div>
    <div class="flex-1 min-w-0">
        <h4 class="text-sm font-medium text-gray-900 truncate">{{ $watchlist->anime->title }}</h4>
        <div class="mt-1 flex items-center">
            <span class="px-2 py-1 text-xs rounded {{ $watchlist->status === 'watching' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                {{ ucfirst($watchlist->status) }}
            </span>
            <span class="ml-2 text-sm text-gray-500">
                {{ $watchlist->episodes_watched }}/{{ $watchlist->anime->episodes ?? '?' }} eps
            </span>
        </div>
    </div>
    <div class="flex-shrink-0">
        <button type="button" class="text-indigo-600 hover:text-indigo-900">
            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
            </svg>
        </button>
    </div>
</div> 