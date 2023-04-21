<div class="space-y-4">
    @forelse ($reviews as $review)
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <div class="flex items-center mb-2">
                        <div class="text-yellow-400">
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= $review->rating)
                                    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                                        <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                                    </svg>
                                @else
                                    <svg class="w-5 h-5 fill-current text-gray-300" viewBox="0 0 24 24">
                                        <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                                    </svg>
                                @endif
                            @endfor
                        </div>
                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">
                            {{ $review->created_at->diffForHumans() }}
                        </span>
                    </div>
                    <p class="text-gray-700 dark:text-gray-300">{{ $review->content }}</p>
                </div>
                
                @if (Auth::id() === $review->user_id)
                    <div class="flex space-x-2">
                        <button 
                            onclick="editReview({{ $review->id }})"
                            class="text-sm text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300"
                        >
                            Edit
                        </button>
                        <form action="{{ route('reviews.destroy', $review) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button 
                                type="submit" 
                                class="text-sm text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-300"
                                onclick="return confirm('Are you sure you want to delete this review?')"
                            >
                                Delete
                            </button>
                        </form>
                    </div>
                @endif
            </div>
            
            <div class="flex items-center">
                <img 
                    src="{{ $review->user->profile_photo_url }}" 
                    alt="{{ $review->user->name }}"
                    class="w-8 h-8 rounded-full mr-3"
                >
                <span class="font-medium text-gray-900 dark:text-gray-100">
                    {{ $review->user->name }}
                </span>
            </div>
        </div>
    @empty
        <p class="text-gray-500 dark:text-gray-400 text-center py-4">No reviews yet. Be the first to review!</p>
    @endforelse
</div> 