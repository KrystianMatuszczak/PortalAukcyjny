<div class="p-2">
    <form wire:submit.prevent="save">
        <h3 class="text-xl font-semibold leading-tight text-gray-800">
        @if ($editMode)
            {{ __('Tworzenie nowej kategorii') }}
        @else
            {{ __('Edycja kategorii') }}
        @endif
        </h3>
        <hr class="my-2">
        <div class="grid grid-cols-2 gap-2">
            <div class="">
                <label for="name">{{ __('Nazwa') }}</lable>
            </div>
            <div class="">
                <x-input placeholder="{{ __('Wprowadż wartość') }}" wire:model="category.name"/>
            </div>
        </div>
        <hr class="my-2">
        <div class="flex jusitfy-end pt-2">
            <x-button href="{{ route('categories.index') }}" secondary class="mr-2" label="{{ __('Wstecz') }}"/>
            <x-button type="submit" primary label="{{ __('Zapisz') }}" spinner/>
        </div>
    </form>
</div>