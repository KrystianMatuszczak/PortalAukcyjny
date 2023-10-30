<div class="p-2">
    <form wire:submit.prevent="save">
        <h3 class="text-xl font-semibold leading-tight text-gray-800">
        @if ($editMode)
            {{__('Edytuj Produkt')}}
        @else
            {{__('Utwórz nowy produkt')}}
        @endif
        </h3>
    <hr class="my-2">
        <div class="grid grid-cols-2 gap-2">

            <div class="">
                <label form="name">{{ __('Nazwa')}} </label>
            </div>

            <div class="">
                <x-input placeholder="{{ __('Wprowadź nazwę')}}" wire:model="product.name" />
            </div>
        </div>

        <hr class="my-2">
        <div class="grid grid-cols-2 gap-2">

            <div class="">
                <label form="description">{{ __('Opis')}} </label>
            </div>

            <div class="">
                <x-textarea placeholder="{{ __('Wprowadź opis')}}" wire:model="product.description" />
            </div>
        </div>

        <hr class="my-2">
        <div class="grid grid-cols-2 gap-2">

            <div class="">
                <label form="categories">{{ __('Kategorie')}} </label>
            </div>

            <div class="">
                <x-select multiselect placeholder="{{ __('Wybierz...')}}" wire:model="categoriesIds"
                :async-data="route('async.categories')" option-label="name" option-value="id"
                 />
            </div>
        </div>

     <hr class="my-2">
        <div class="grid grid-cols-2 gap-2">

        <div class="">
                <label form="price">{{ __('Cena')}} </label>
            </div>

            <div class="">
                <x-inputs.currency thousands=" " precision="2" placeholder="{{ __('Wprowadź Cenę')}}" wire:model="product.price" />
            </div>
        </div>

        <hr class="my-2">
        <div class="grid grid-cols-2 gap-2">

        <div class="">
            <label form="amount">{{ __('Ilość')}} </label>
        </div>

        <div class="">
            <x-inputs.currency thousands=" " precision="2" placeholder="{{ __('Wprowadź ilość produktów na sprzedaz')}}" wire:model="product.amount" />
        </div>
    </div>

    <hr class="my-2">
    <div class="grid grid-cols-2 gap-2">

        <div class="">
            <label form="localization">{{ __('Lokalizacja')}} </label>
        </div>

        <div class="">
            <x-input placeholder="{{ __('Wprowadź lokalizację produktu')}}" wire:model="product.localization" />
        </div>
    </div>


    <hr class="my-2">
        <div class="grid grid-cols-2 gap-2">

            <div class="">
                <label form="shipments">{{ __('Metody Dostawy')}} </label>
            </div>

            <div class="">
                <x-select multiselect placeholder="{{ __('Wybierz...')}}" wire:model="shipmentsIds"
                :async-data="route('async.shipments')" option-label="name" option-value="id"
                 />
            </div>
        </div>


    <hr class="my-2">
        <div class="grid grid-cols-2 gap-2">

            <div class="">
                <label form="image">{{ __('Wybierz Obraz')}} </label>
            </div>

            <div class="">
        @if ($imageExists)
            <div class="relative">
                <img class="w-full" src="{{ $imageUrl }}" alt="{{ $product->name }}">
                <div class="absolute top-2 right-2 h-16"> 
                <x-button.circle outline xs secondary icon="trash" wire:click="deleteImageConfirm" />
            </div>
        </div>
        @else
            <x-input type="file" wire:model="image" />
        @endif
        <hr class="my-2">
        <div class="flex justify-end pt-2">
            <x-button href="{{ route('products.index') }}" secondary class="mr-2" label=" {{ __('Cofnij') }}" />
            <x-button type="submit" primary label="{{ __('Zapisz') }}" />
        </div>
    </form>

</div>