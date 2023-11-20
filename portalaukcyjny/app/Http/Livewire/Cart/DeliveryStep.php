<?php

namespace App\Http\Livewire\Cart;

use Illuminate\Support\Str;
use Spatie\LivewireWizard\Components\StepComponent;

class DeliveryStep extends StepComponent 
{
    public string $name = '';
    public string $lastName = '';
    public string $address = '';
    public string $phoneNumber = '';
    public string $email = " ";

    public array $rules = [
        'name' => 'required|min:2',
        'lastname' => 'required|min:2',
        'address' => 'required|min:2',
        'phoneNumber' => 'required|min:2',
        'email' => 'required|min:2',
    ];

    public function validationAttributes()
    {
        return [
            'name' => Str::lower(__('Imie')),
            'lastname' => Str::lower(__('Nazwisko')),
            'address' => Str::lower(__('Adres')),
            'phoneNumber' => Str::lower(__('Numer Telefonu')),
            'email' => Str::lower(__('Email'))
        ];
    }

    public function stepInfo(): array
    {
        return [
            'label' => __('Dane odbiorcy'),
            'icon' => __('location-marker'),
        ];
    }

    public function update($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $this->nextStep();
    }

    public function render()
    {
        return view('livewire.cart.delivery-step');
    }
}
