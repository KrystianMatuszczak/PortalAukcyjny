<div>
@if (count($qty) > 0)
    <x-order-wizard.steps-bar :steps="$steps" />
@endif
<div class="">
@if (count($qty) === 0)
    <div class="mt-2 mb-2 text-center">{{__('Koszyk jest pusty')}}</div>
@else
<div class="p-4">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="py-3 px-6">
                <span class="sr-only">{{__('Obraz')}}</span>
            </th>
            <th scope="col" class="py-3 px-6">
                {{__('Nazwa')}}
            </th>

            <th scope="col" class="py-3 px-6">
                {{__('Ilość')}}
            </th>
            
            <th scope="col" class="py-3 px-6">
                {{__('Cena')}}
            </th>

            <th scope="col" class="py-3 px-6">
                {{__('Koszt')}}
            </th>
           
            <th scope="col" class="py-3 px-6">
            </th>
        </tr>
        </thead>

        <tbody>
            @foreach ($this->items as $product)
                <tr class="border-b bg-white hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-600">
                    <td class="w-32 p-4">
                        <img src="{{ $product->imageUrl() }}" alt="{{$product->name}}">
                    </td>
                    <td class="py-4 px-6 font-semibold text-gray-900 dark:text-white">
                        {{$product->name}}
                    </td>

                    <td class="py-4 px-6">
                        <div class="flex items-center space-x-3">
                            <button wire:click="decreaseQty({{ $product->id }})"
                                @if ($qty[$product->id] === 1) disable
                                @endif
                            class="inline-flex items-center rounded-full border border-gray-300 bg-white p-1 text-sm font-medium text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:border-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-700"
                            type="button">
                            <span class="sr-only"> {{__('odejmowanie')}}></span>
                            <x-icon name="minus" class="h-4 w-4" />
                            </button>
                        <div>
                            <x-input readonly wire:model="qty.{{$product->id}}"
                                class="block w-14 rounded-lg border border-gray-300 bg-gray-50 px-2.5 py-1 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500" />
                        </div>

                        <button wire:click="increaseQty({{ $product->id }})"
                            @if ($qty[$product->id] === 1) disable
                            @endif
                        class="inline-flex items-center rounded-full border border-gray-300 bg-white p-1 text-sm font-medium text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:border-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-700"
                        type="button">
                        <span class="sr-only"> {{__('dodawanie')}}></span>
                        <x-icon name="plus" class="h-4 w-4" />
                    </td>
                   
                    <td class="py-4 px-6 font-semibold text-gray-900 dark:text-white">
                        {{$product->price}} {{__('PLN')}}
                    </td>

                    <td class="py-4 px-6 font-semibold text-gray-900 dark:text-white">
                        {{$product->cost($qty[$product->id])}}
                    </td>
                    
                    <td class="py-4 px-6">
                    <x-button.circle outline xs secondary icon="trash"
                        wire:click="removeConfirmation({{ $product->id }})" />
                    </td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="flex justify-end m-4">
        <x-button wire:click="nextStep" right-icon="chevron-double-right" label="{{__('Dalej')}}" primary />
    </div>

    </div>
@endif
</div>
</div> 