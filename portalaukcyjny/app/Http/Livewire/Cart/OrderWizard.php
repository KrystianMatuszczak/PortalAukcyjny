<?php

namespace App\Http\Livewire\Cart;

use App\Support\OrderWizardState;
use App\Http\Livewire\Cart\CartStep;
use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\Cart\DeliveryStep;
use App\Http\Livewire\Cart\ConfirmOrderStep;
use Spatie\LivewireWizard\Components\WizardComponent;

class OrderWizard extends WizardComponent
{
    public function steps(): array
    {
        return [
            CartStep::class,
            DeliveryStep::class,
            ConfirmOrderStep::class,
        ];
    }

    public function initialState(): array
    {
        $trim = Auth::user()->name;
        $space_poz = strpos($trim, " ");
        $firstname = substr($trim, 0, $space_poz);
        $lastname = substr($trim,$space_poz + 1);
        return [
            'delivery-step' => [
                'name' => $firstname,
                'lastName' => $lastname,
                'email' => Auth::user()->email,
                
            ],
        ];
    }

    public function stateClass(): string
    {
        return OrderWizardState::class;
    }
}
