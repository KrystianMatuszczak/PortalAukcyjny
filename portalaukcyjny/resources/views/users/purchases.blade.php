<x-app-layout>
    <header class="bg-white shadow text-xl">
        <h2 class="text-center max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            {{ __('Moje zakupy') }}
        </h2>
    </header>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg" id="table-view-wrapper">
              @foreach($purchases as $purchase)
                <p>{{ __('Zakup: ') }}</p>
                {{ $purchase }}
                {{ $purchase->products }}
              @endforeach
            </div>
        </div>
    </div>
</x-app-layout>