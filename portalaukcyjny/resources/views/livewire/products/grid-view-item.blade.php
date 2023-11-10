@props([
  'image' => '',
  'title' => '',
  'price' => '',
  'amount' => '',
  'localization' => '',
  'description' => '',
  'withBackground' => false,
  'model',
  'actions' => [],
  'hasDefaultAction' => false,
  'selected' => false
])

<div class="p-4 {{ $withBackground ? 'rounded-md shadow-md' : '' }}">
  <a href="{{ route('products.show', $model->id) }}">
    <img src="{{ $image }}" alt="{{ $image }}" class="rounded-md h-48 w-full hover:shadow-lg object-cover {{ $withBackground ? 'rounded-b-none' : '' }}  {{ $selected ? variants('gridView.selected') : "" }}">
  </a>
  <div class="p-4 pt-4 {{ $withBackground ? 'bg-white rounded-b-md p-4' : '' }}">
    <div class="flex items-start">
      <div class="flex-1">
        <h3 class="font-bold leading-6 text-gray-900 {{ $model->deleted_at ? 'line-through' : ''}}">
          @if ($hasDefaultAction)
            <a href="#!" class="hover:underline" wire:click.prevent="onCardClick({{ $model->getKey() }})">
              {!! $title !!}
            </a>
          @else
            {!! $title !!}
          @endif
          @if ($price)
          <span class="flex justify-end text-sm text-gray-600">
          {{__('Cena')}}: {!! $price !!}
          {{ __('PLN')}}
          </span>
          <span class="flex justify-end text-sm text-gray-600">
            {{__('Szt. ')}}: {!! $amount !!}
            
            </span>
        @endif

        </h3>
        @if ($categories)
            <span class="flex justify-end text-sm text-gray-600">
                @foreach ($categories as $category)
                <span class="mr-2 rounded bg-gray-100 px-2.5 py-0.5 text-xs font-semibold text-gray-800 dark:bg-gray-700 dark:text-gray-300">{{$category->name}}
                </span>
                    
                @endforeach
            </span>
        @endif
      </div>

      @if ($conditions)
            <span class="flex justify-end text-sm text-gray-600">
                @foreach ($conditions as $condition)
                <span class="mr-2 rounded bg-gray-100 px-2.5 py-0.5 text-xs font-semibold text-gray-800 dark:bg-gray-700 dark:text-gray-300">{{$condition->name}}
                </span>
                    
                @endforeach
            </span>
        @endif
      </div>

      @if (count($actions))
        <div class="flex justify-end items-center">
          <x-lv-actions.drop-down :actions="$actions" :model="$model" />
        </div>
      @endif
    </div>

    @if (isset($description))
      <p class="p-4 line-clamp-3 mt-2">
        {!! $description !!}
      </p>
    @endif

    <span class="flex justify-center text-sm text-black-500 bg-gray-100">
      {!! $localization !!}
      
      </span>
  </div>
</div>