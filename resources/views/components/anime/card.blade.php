@props(['anime'])

<div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
    <div class="relative pb-[56.25%]">
        @if($anime->cover_image)
            <img src="{{ $anime->cover_image }}" alt="{{ $anime->title }}" class="absolute top-0 left-0 w-full h-full object-cover">
        @else
            <div class="absolute top-0 left-0 w-full h-full bg-gray-200 flex items-center justify-center">
                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </div>
        @endif
        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/60 to-transparent p-4">
            <span class="inline-block px-2 py-1 text-xs text-white bg-indigo-600 rounded">{{ $anime->status }}</span>
        </div>
    </div>
    <div class="p-4">
        <h3 class="font-semibold text-lg mb-2 truncate">{{ $anime->title }}</h3>
        <div class="flex items-center text-sm text-gray-600 mb-2">
            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
            </svg>
            {{ number_format($anime->rating, 1) }}
        </div>
        <p class="text-sm text-gray-600 line-clamp-2">{{ $anime->synopsis ?? $anime->content }}</p>
        <div class="mt-4 flex items-center justify-between">
            <span class="text-sm text-gray-500">{{ $anime->episodes ?? '?' }} episodes</span>
            <a href="#" class="text-indigo-600 hover:text-indigo-800 text-sm font-medium">View Details →</a>
        </div>
    </div>
</div> 