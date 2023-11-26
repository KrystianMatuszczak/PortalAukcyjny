<div>
  <x-order-wizard.steps-bar :steps="$steps" />
  <div class="p-4">
    <hr class="my-2">
    <div class="grid grid-cols-2 gap-2">
      <div class="">
        <label for="name"> {{__('Imie') }} </label>
      </div>
      <div class="">
        <x-textarea placeholder="{{ __('Wprowadź Imię') }}" wire:model="firstName" />
      </div>
    </div>

    <hr class="my-2">
    <div class="grid grid-cols-2 gap-2">
      <div class="">
        <label for="lastname"> {{__('Nazwisko') }} </label>
      </div>
      <div class="">
        <x-textarea placeholder="{{ __('Wprowadź nazwisko') }}" wire:model="lastName" />
      </div>
    </div>

    <hr class="my-2">
    <div class="grid grid-cols-2 gap-2">
      <div class="">
        <label for="address"> {{__('Adres') }} </label>
      </div>
      <div class="">
        <x-textarea placeholder="{{ __('Wprowadź adres') }}" wire:model="address" />
      </div>
    </div>

    <hr class="my-2">
    <div class="grid grid-cols-2 gap-2">
      <div class="">
        <label for="phoneNumber"> {{__('Numer Telefonu') }} </label>
      </div>
      <div class="">
        <x-textarea placeholder="{{ __('Wprowadź numer telefonu') }}" wire:model="phoneNumber" />
      </div>
    </div>

    <hr class="my-2">
    <div class="grid grid-cols-2 gap-2">
      <div class="">
        <label for="email"> {{__('Adres email') }} </label>
      </div>
      <div class="">
        <x-textarea placeholder="{{ __('Wprowadź adres email') }}" wire:model="email" />
      </div>
    </div>

    <div class="m-4 flex justify-between">
      <x-button wire:click="previousStep" icon="chevron-double-left" label="{{ __('Cofnij')}}" secondary spinner />
      <x-button wire:click="submit" icon="chevron-double-right" label="{{ __('Dalej')}}" primary spinner />                   
    </div>
  </div>
</div>