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
                <x-input placeholder="{{ __('Wprowadź nazwę')}}" wire:model="shipment.name" />
            </div>
        </div>

        <hr class="my-2">
        <div class="grid grid-cols-2 gap-2">

        <div class="">
                <label form="price">{{ __('Cena')}} </label>
            </div>

            <div class="">
                <x-inputs.currency thousands=" " precision="2" placeholder="{{ __('Wprowadź Cenę')}}" wire:model="shipment.shipPrice" />
            </div>
        </div>

        <hr class="my-2">
        <div class="flex justify-end pt-2">
            <x-button href="{{ route('shipments.index') }}" secondary class="mr-2" label=" {{ __('Cofnij') }}" />
            <x-button type="submit" primary label="{{ __('Zapisz') }}" />
        </div>
    </form>

</div>