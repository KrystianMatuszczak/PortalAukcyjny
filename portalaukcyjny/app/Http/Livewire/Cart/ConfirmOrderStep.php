<?php

namespace App\Http\Livewire\Cart;

use App\Models\Product;
use LaravelViews\Views\View;
use Spatie\LivewireWizard\Components\StepComponent;

class ConfirmOrderStep extends StepComponent
{
    public $orderQtyAndCost;

    public function mount()
    {
        $this->orderQtyAndCost = $this->state()->qtyAndCost();
    }

    public function getItemsProperty()
    {
        return Product::whereIn(
            'id',
            array_keys($this->orderQtyAndCost)
        )->get()->keyBy('id');
    }

    public function stepInfo(): array
    {
        return[
            'label' => __('Potwierdzenie Rezerwacji'),
            'icon' => 'check',
        ];
    }

    public function submit($model, View $view)
    {
        return view('orders.index');
    }

    public function render()
    {
        return view(
            'livewire.cart.confirm-order-step', [
            'delivery' => $this->state()->delivery(),
            'totalQtyItems' => $this->state()->totalQtyItems(),
            'totalCost' => $this->state()->totalCost(),
        ]);
    }
}
