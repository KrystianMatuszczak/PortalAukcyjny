<?php

namespace App\Http\Livewire\Cart;

use App\Models\Product;
use WireUi\Traits\Actions;
use App\Facades\CartService;
use Spatie\LivewireWizard\Components\StepComponent;

class CartStep extends StepComponent
{
    use Actions;

    public array $qty;

    public function mount()
    {
        $this->qty = CartService::qty();
    }

    public function getItemsProperty()
    {
        return Product::whereIn('id', array_keys($this->qty))
        ->get()->keyBy('id');
    }

    public function render()
    {
        return view('livewire.cart.cart-step');
    }

    public function increaseQty(int $id)
    {
        $this->qty = CartService::increaseQty($id);
        $this->emit('cartUpdated');
    }

    public function decreaseQty(int $id)
    {
        if (isset($this->qty[$id]) && $this->qty[$id] > 1)
        {
            $this->qty = CartService::decreaseQty($id);
            $this->emit('cartUpdated');
        }
    }

    public function stepInfo(): array
    {
        return[
            'label' => __('Koszyk'),
            'icon' => 'shopping-cart',
        ];
    }

    public function removeConfirmation(int $id)
    {
        $product = $this->items->get($id);
        $this->dialog()->confirm([
            'title' => __('Czy chcesz usunac produkt z listy?'),
            'description' => __('Napewno?', [
                'name' => optional($product)->name
            ]),
            'icon' => 'question',
            'iconColor' => 'text-red-500',
            'accept' => [
                'label' => __('Tak'),
                'method' => 'remove',
                'params' => $id,
            ],
            'reject' => [
                'label' => __('Nie')
            ]
        ]);
    }

    public function remove(int $id)
    {
        $this->qty = CartService::remove($id);
        $this->emit('cartUpdated');
    }
}
