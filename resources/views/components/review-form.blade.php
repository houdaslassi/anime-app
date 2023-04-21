<div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6 mb-4">
    <h3 class="text-lg font-semibold mb-4">Write a Review</h3>
    
    <form action="{{ route('reviews.store', $anime) }}" method="POST">
        @csrf
        
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                Rating
            </label>
            <div class="flex space-x-4">
                @for ($i = 1; $i <= 5; $i++)
                    <label class="flex items-center">
                        <input type="radio" name="rating" value="{{ $i }}" class="form-radio" required>
                        <span class="ml-2">{{ $i }}</span>
                    </label>
                @endfor
            </div>
        </div>
        
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                Review
            </label>
            <textarea 
                name="content" 
                rows="4" 
                class="w-full rounded-md shadow-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" 
                required 
                minlength="10"
                maxlength="1000"
            ></textarea>
        </div>
        
        <div class="flex justify-end">
            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                Post Review
            </button>
        </div>
    </form>
</div> 