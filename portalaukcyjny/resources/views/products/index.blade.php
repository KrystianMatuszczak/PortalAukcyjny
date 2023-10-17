<x-app-layout>
    <x-slot name="header">
          <h2 class="text-xl font-semibold leading-tight text-gray-800">
              Produkty
          </h2>
      </x-slot>
      <div class="py-12">
          <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mt-4">
            </div>
              <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="grid justify-items-stretch pt-2 pr-2">
                  <x-button primary label="{{ __('Dodaj Produkt')}}" 
                  href="{{ route('products.create')}}" class="justify-self-end"  />
              </div>
                <livewire:products.products-grid-view />
              </div>
          </div>
      </div>
  </x-app-layout>