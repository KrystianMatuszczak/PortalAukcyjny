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
                <label form="name">{{ __('Nazwa: ')}} </label>
            </div>

            <div class="">
                <x-input placeholder="{{ __('Wprowadź nazwę: ')}}" wire:model="product.name" />
            </div>
        </div>

    <hr class="my-2">
        <div class="grid grid-cols-2 gap-2">

            <div class="">
                <label form="description">{{ __('Opis')}} </label>
            </div>

            <div class="">
                <x-textarea placeholder="{{ __('Wprowadź Opis')}}" wire:model="product.description" />
            </div>
        </div>

    {{-- <hr class="my-2">
        <div class="grid grid-cols-2 gap-2"> --}}

            {{-- <div class="">
                <label form="price">{{ __('Cena')}} </label>
            </div>

            <div class="">
                <x-inputs.currency thousands=" " precision="2" placeholder="{{ __('Wprowadź Cene')}}" wire:model="product.price" />
            </div>
        </div> --}}

    <hr class="my-2">
        <div class="grid grid-cols-2 gap-2">

            <div class="">
                <label form="categories">{{ __('Wybierz Kategorie')}} </label>
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
                <label form="image">{{ __('Wybierz Obraz')}} </label>
            </div>

            <div class="">
        @if ($imageExists)
            <div class="relative">
                <img class="w-full" src="{{ $imageUrl }}" alt="{{ $car->name }}">
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