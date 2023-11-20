<div>
    <x-order-wizard.steps-bar :steps="$steps" />
    <div class="p-4">
        <hr class="my-2">
        <div class="grid grid-cols-2 gap-2">
            <div class="">
                <label for="name"> {{__('Imie') }} </label>
            </div>
            <div class="">
                <x-textarea placeholder="{{ __('Wprowadz Imię') }}" wire:model="name" />
            </div>
        </div>

        <hr class="my-2">
        <div class="grid grid-cols-2 gap-2">
            <div class="">
                <label for="lastname"> {{__('Nazwisko') }} </label>
            </div>
            <div class="">
                <x-textarea placeholder="{{ __('Wprowadz nazwisko') }}" wire:model="lastName" />
            </div>
        </div>

        <hr class="my-2">
        <div class="grid grid-cols-2 gap-2">
            <div class="">
                <label for="address"> {{__('Adres') }} </label>
            </div>
            <div class="">
                <x-textarea placeholder="{{ __('Wprowadz adres') }}" wire:model="address" />
            </div>
        </div>

        <hr class="my-2">
        <div class="grid grid-cols-2 gap-2">
            <div class="">
                <label for="phoneNumber"> {{__('Numer Telefonu') }} </label>
            </div>
            <div class="">
                <x-textarea placeholder="{{ __('Podaj numer telefonu') }}" wire:model="phoneNumber" />
            </div>
        </div>

        <hr class="my-2">
        <div class="grid grid-cols-2 gap-2">
            <div class="">
                <label for="email"> {{__('Email') }} </label>
            </div>
            <div class="">
                <x-textarea placeholder="{{ __('Wprowadz email') }}" wire:model="email" />
            </div>
        </div>

        <div class="m-4 flex justify-between">
        <x-button wire:click="previousStep" icon="chevron-double-left" label="{{ __('Cofnij')}}" secondary spinner />
        <x-button wire:click="submit" icon="chevron-double-right" label="{{ __('Dalej')}}" primary spinner />                   
        </div>

    </div>
</div>