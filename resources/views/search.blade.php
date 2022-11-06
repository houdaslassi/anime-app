<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Search') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="#" method="get" class="space-y-2">
                        <x-text-input value="{{ request()->get('query') }}" id="query" name="query" type="search" placeholder="Search.." class="block w-full mb-4" />
                        <x-primary-button class="mb-4">Search</x-button>
                    </form>
                    @if ($results)
                        <div class="space-y-4">
                            @if ($results->count())
                               @foreach ($results as $result)
                                 <div>
                                    <h1 class="text-lg font-semibold">{{ $result->title }}</h1>
                                    <p> {{ $result->content }} </p>
                                 </div>
                               @endforeach
                            @else
                               <p>you don't have results yet</p>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
