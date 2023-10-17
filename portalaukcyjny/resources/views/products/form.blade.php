<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{__('Produkty') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg">
                @if (isset($product))
                <livewire:products.product-form :product="$product" :editMode="true" />
                @else
                    <livewire:products.product-form :editMode="false" />
                @endif
            </div>
        </div>
    </div>

</x-app-layout>