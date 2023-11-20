<?php

namespace App\Support;

use App\Models\Product;
use App\Facades\CartService;
use Spatie\LivewireWizard\Support\State;

class OrderWizardState extends State
{
public function delivery(): array
{
    $deliveryStepState = $this->forStep('delivery-step');
    return[
        'name' => isset($deliveryStepState['name'])
            ? $deliveryStepState['name']
            : '',
        'lastName' => isset($deliveryStepState['lastName'])
        ? $deliveryStepState['lastName']
        : '',
        'address' => isset($deliveryStepState['address'])
        ? $deliveryStepState['address']
        : '',
        'phoneNumber' => isset($deliveryStepState['phoneNumber'])
        ? $deliveryStepState['phoneNumber']
        : '',
        'email' => isset($deliveryStepState['email'])
        ? $deliveryStepState['email']
        : '',
    ];
}

    public function qtyAndCost(): array
    {
        $orderQty = CartService::qty();
        $products = Product::whereIn(
            'id',
            array_keys($orderQty)
        )->get()->keyBy('id');
        $qtyAndCost = [];
    foreach ($orderQty as $id => $qty)
    {
        $qtyAndCost[$id] = [
        'qty' => $qty,
        'price' => optional($products->get($id))->price,
        'cost' =>  $qty * optional($products->get($id))->price,
        ];
    }
    return $qtyAndCost;
    }

    public function totalQtyItems(): int
    {
        return count(CartService::qty());
    }

    public function totalCost(): float
    {
        $sum = 0.0;
        
        foreach ($this->qtyAndCost() as $item)
        {
            $sum += $item['cost'];
        }
        return $sum;
    } 
}
