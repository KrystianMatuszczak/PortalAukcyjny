<?php

namespace App\Http\Livewire\Shipments;

use Livewire\Component;
use App\Models\Shipment;
use WireUi\Traits\Actions;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ShipmentForm extends Component
{
    use Actions;
    use AuthorizesRequests;

    public Shipment $shipment;
    public Bool $editMode;

    public function rules()
    {
        return[
            'shipment.name'=>[
                'required',
                'string',
                'min:2',
                'unique:shipments,name' .
                    ($this->editMode ? (',' . $this->shipment->id):''),
            ],

            'shipment.shipPrice' => [
                'required',
                'numeric',
                'gt:0',
                'max:100000',
            ],
        ];
    }
    public function validationAtrributes()
    {
        return[
            'name'=>Str::lower(__('Nazwa')),
            'shipPrice'=>Str::lower(__('Cena'))
        ];
    }

    public function mount(Shipment $shipment, Bool $editMode)
    {
        $this->shipment=$shipment;
        $this->editMode=$editMode;
    }

    public function render()
    {
        return view('livewire.shipments.shipment-form');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        if($this->editMode){
            $this->authorize('update',$this->shipment);
        }else{
            $this->authorize('create',Shipment::class);
        }
        $this->validate();
        $this->shipment->save();
        $this->notification()->success(
            $title = $this->editMode
                ? __('Zaktualizowano')
                : __('Utworzony'),
            $description = $this->editMode
                ? __('Zaktualizowano kategorię :name',['name' => $this->shipment->name])
                : __('Dodano kategorię :name',['name' => $this->shipment->name])
        );
        $this->editMode = true;
    }
}
