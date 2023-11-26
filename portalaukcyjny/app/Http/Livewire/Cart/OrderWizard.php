<?php

namespace App\Http\Livewire\Cart;

use App\Support\OrderWizardState;
use App\Http\Livewire\Cart\CartStep;
use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\Cart\DeliveryStep;
use App\Http\Livewire\Cart\ConfirmOrderStep;
use Spatie\LivewireWizard\Components\WizardComponent;

class OrderWizard extends WizardComponent {

  public function steps(): array {
    return [
      CartStep::class,
      DeliveryStep::class,
      ConfirmOrderStep::class,
    ];
  }

  public function initialState(): array {
    $userAddressDetails = Auth::user()->userAddressDetails;
    if ($userAddressDetails) {
      return [
        'delivery-step' => [
          'firstName' => $userAddressDetails->firstName,
          'lastName' => $userAddressDetails->lastName,
          'address' => $userAddressDetails->address,
          'phoneNumber' => $userAddressDetails->phoneNumber,
          'email' => $userAddressDetails->email
        ]
      ];
    }
    return [];
  }

  public function stateClass(): string {
    return OrderWizardState::class;
  }
}
