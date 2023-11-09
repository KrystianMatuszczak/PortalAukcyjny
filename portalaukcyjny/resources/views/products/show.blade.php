<x-app-layout>
    <header class="bg-white shadow text-xl">
        <h2 class="text-center max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            {{ $product->name}}
        </h2>
    </header>
    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <img src="{{ $product->imageUrl()}}" alt="" class="rounded-md h-48 w-full object-cover">
                <div class="grid grid-cols-2 gap-2">
                    <div class="p-2">
                            {{ __('Nazwa') }}:
                    </div>
                    <div class="p-2">
                        <span> {{ $product->name}}</span>
                    </div>
                </div>
                <hr class="my-2">
                <div class="grid grid-cols-2 gap-2">
                    <div class="p-2">
                            {{ __('Szczegóły') }}:
                    </div>
                    <div class="p-2">
                        <span> {{ $product->description}}</span>
                    </div>
                </div>  
                <hr class="my-2">
                <div class="grid grid-cols-2 gap-2">
                    <div class="p-2">
                            {{ __('Ilość') }}:
                    </div>
                    <div class="p-2">
                        <span> {{ $product->amount}}</span>
                    </div>
                </div>
                <hr class="my-2">
                <div class="grid grid-cols-2 gap-2">
                    <div class="p-2">
                            {{ __('Cena:') }}
                    </div>
                    <div class="p-2">
                        <span> {{ $product->price}} min.</span>
                    </div>
                </div>
                <hr class="my-2">
                <span class="flex justify-end text-sm text-gray-600">
                    {{ __('Kategorie:') }}
                   @foreach ($product->categories as $category )
                       <span class="mr-2 rounded bg-gray-100 px-2.5 py-0.5 text-xs font-semibold text-gray-800 dark:bg-gray-700 dark:text-gray-300">{{ $category->name }}</span>
                   @endforeach
               </span>
                <hr class="my-2">
                <div class="flex justify-center pt-2 pb-2">
                <x-button href="{{ url()->previous() }}" secondary class="mr-2" label="Wróć" />
                <x-button href="#" icon="shopping-cart" secondary class="mr-2" label="Dodaj do koszyka"/>
                </div>
        </div>
        </div>
    </div>
</x-app-layout>