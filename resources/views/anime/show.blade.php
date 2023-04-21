<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Anime Details -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6">
                    <div class="flex flex-col md:flex-row">
                        <div class="md:w-1/3">
                            <img src="{{ $anime->image_url }}" alt="{{ $anime->title }}" class="w-full rounded-lg">
                        </div>
                        <div class="md:w-2/3 md:pl-6 mt-4 md:mt-0">
                            <h1 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">{{ $anime->title }}</h1>
                            <p class="text-gray-600 dark:text-gray-300 mb-4">{{ $anime->description }}</p>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <h3 class="font-semibold text-gray-700 dark:text-gray-200">Episodes</h3>
                                    <p class="text-gray-600 dark:text-gray-300">{{ $anime->episodes }}</p>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-700 dark:text-gray-200">Status</h3>
                                    <p class="text-gray-600 dark:text-gray-300">{{ $anime->status }}</p>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-700 dark:text-gray-200">Type</h3>
                                    <p class="text-gray-600 dark:text-gray-300">{{ $anime->type }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Reviews Section -->
            <div class="space-y-6">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Reviews</h2>
                
                <!-- Review Form -->
                @auth
                    @include('components.review-form', ['anime' => $anime])
                @else
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6 mb-4">
                        <p class="text-gray-600 dark:text-gray-400">
                            Please <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-800 dark:text-blue-400">login</a> 
                            to write a review.
                        </p>
                    </div>
                @endauth

                <!-- Review List -->
                @include('components.review-list', ['reviews' => $anime->reviews()->with('user')->latest()->get()])
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        function editReview(reviewId) {
            // TODO: Implement edit functionality
            alert('Edit functionality coming soon!');
        }
    </script>
    @endpush
</x-app-layout> 