<?php

namespace App\Http\Livewire\Cart;

use App\Models\Product;
use App\Models\User;
use App\Models\UserAddressDetails;
use Illuminate\Support\Facades\Auth;
use Spatie\LivewireWizard\Components\StepComponent;

class ConfirmOrderStep extends StepComponent
{
    public $orderQtyAndCost;
    public User $user;
    public UserAddressDetails $userAddressDetails;

    public function mount() {
      $this->orderQtyAndCost = $this->state()->qtyAndCost();
      $this->user = Auth::user();
  
      if (!$this->user->userAddressDetails) {
        $this->userAddressDetails = new UserAddressDetails([
          'firstName' => $this->state()->delivery()['firstName'],
          'lastName' => $this->state()->delivery()['lastName'],
          'address' => $this->state()->delivery()['address'],
          'phoneNumber' => $this->state()->delivery()['phoneNumber'],
          'email' => $this->state()->delivery()['email']
        ]);
        $this->userAddressDetails->user_id = $this->user->id;
        $this->userAddressDetails->save();
      } else {
        $this->user->userAddressDetails->firstName = $this->state()->delivery()['firstName'];
        $this->user->userAddressDetails->lastName = $this->state()->delivery()['lastName'];
        $this->user->userAddressDetails->address = $this->state()->delivery()['address'];
        $this->user->userAddressDetails->phoneNumber = $this->state()->delivery()['phoneNumber'];
        $this->user->userAddressDetails->email = $this->state()->delivery()['email'];
        $this->user->userAddressDetails->save();
      }
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

    public function submit()
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
