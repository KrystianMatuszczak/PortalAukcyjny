<div>
    <x-order-wizard.steps-bar :steps="$steps" />
    <div class="p-4">
        <div class="m-4">
 <x-card class="bg-gray-50" shadow="false">
                <div class="grid grid-cols-1 gap-2 md:grid-cols-2 md:gap-4">
                    <div class="flex items-start">
                        <div class="flex-1">
                            <h3 class="font-bold leading-6 text-gray-900">
                            {{__('Dane uzytkownika')}}
                            </h3>
                            <span class="text-sm text-gray-600">
                            {{__('Imie: ')}}
                            {{ $delivery['name']}}
                            </span>
                            <span class="flex justify-start text-sm text-gray-600">
                            {{__('Nazwisko:' )}}
                            {{ $delivery['lastName']}}
                            </span>
                            <span class="flex justify-start text-sm text-gray-600">
                            {{__('Adres:' )}}
                            {{ $delivery['address']}}
                            </span>
                            <span class="flex justify-start text-sm text-gray-600">
                            {{__('Numer telefonu: ')}}
                            {{ $delivery['phoneNumber']}}
                            </span>
                            <span class="flex justify-start text-sm text-gray-600">
                            {{__('Adres Email: ')}}
                            {{ $delivery['email']}}
                            </span>
                        </div>
                    </div>
                    <div>
                        <div class="flex-1">
                        <h3 class="font-bold leading-6 text-gray-900">
                            {{__('Dane klienta')}}
                        </h3>
                        <span class="text-sm text-gray-600">
                            {{__('Ilość: ')}}
                            {{ $totalQtyItems}}
                        </span>
                            
                        <span class="flex justify-start text-sm text-gray-600">
                            {{__('Kwota Laczna: ')}}
                            {{ number_format($totalCost, 2) }} {{__('PLN')}}
                        </span>
                        </div>
                    </div>
            </div>
    </x-card>
</div>
        <div class="m-4">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6">
                    <span class="sr-only">{{__('Obraz')}}</span>
                </th>
                <th scope="col" class="py-3 px-6">
                    {{__('Produkt')}}</span>
                </th>
                <th scope="col" class="py-3 px-6">
                    {{__('Cena')}}</span>
                </th>
            </tr>
            </thead>

            <tbody>
                @foreach ($this->items as $id => $car)
                    <tr class="border-b bg-white hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-600">
                        <td class="w-32 p-4">
                            <img src="{{ $car->imageUrl() }}" alt="{{$car->name}}">
                        </td>
                        <td class="py-4 px-6 font-semibold text-gray-900 dark:text-white">
                            {{$car->name}}
                        </td>
                        <td class="py-4 px-6 font-semibold text-gray-900 dark:text-white">
                            {{ number_format($orderQtyAndCost[$id]['price'], 2)}}
                            {{__('PLN')}}
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
        </div>
            <div class="m-4 flex justify-between">
                <x-button wire:click="previousStep" icon="chevron-double-left"
                    label="{{ __('Cofnij') }}" secondary spinner />
                <x-button wire:click="submit" icon="chevron-double-right"
                    label="{{ __('Potwierdz') }}" primary spinner />
            </div>
        </div>
    </div>
</div>


