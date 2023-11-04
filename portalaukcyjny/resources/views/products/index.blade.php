<x-app-layout>
  <header class="bg-white shadow text-xl">
    <h2 class="text-center max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
      Produkty
    </h2>
  </header>
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="grid justify-items-stretch pt-4 pb-2">
      @can('create', App\Models\Product::class)
      <x-button primary label="{{ __('Dodaj Produkt')}}" 
      href="{{ route('products.create')}}" class="justify-self-end"  />
      @endcan
    </div>
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg pt-4 pl-3">
      <livewire:products.products-grid-view />
    </div>
  </div>
</x-app-layout>