<?php

namespace App\Http\Livewire\Cart;

use Livewire\Component;
use App\Facades\CartService;

class CartCounter extends Component
{
    public $count = 0;

    public $fullName, $email, $phoneNumber;

    protected $listeners = [
        'cartUpdated' =>'updateCount',
    ];

    public function mount()
    {
        $this->count = CartService::itemsCount();
    }

    public function render()
    {
        return view('livewire.cart.cart-counter');
    }

    public function updateCount()
    {
        $this->count = CartService::itemsCount();
    }
}
