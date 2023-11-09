<?php

namespace App\Http\Livewire\Conditions;

use Livewire\Component;
use App\Models\Condition;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use WireUi\Traits\Actions;
use Illuminate\Support\Str;

class ConditionForm extends Component
{
    use Actions;
    use AuthorizesRequests;

    public Condition $condition;
    public Bool $editMode;

    public function rules()
    {
        return[
            'condition.name'=>[
                'required',
                'string',
                'min:2',
                'unique:conditions,name' .
                    ($this->editMode ? (',' . $this->condition->id):''),
            ],
        ];
    }
    public function validationAtrributes()
    {
        return[
            'name'=>Str::lower(__('Nazwa'))
        ];
    }

    public function mount(Condition $condition, Bool $editMode)
    {
        $this->condition=$condition;
        $this->editMode=$editMode;
    }

    public function render()
    {
        return view('livewire.conditions.condition-form');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        if($this->editMode){
            $this->authorize('update',$this->condition);
        }else{
            $this->authorize('create',Condition::class);
        }
        $this->validate();
        $this->condition->save();
        $this->notification()->success(
            $title = $this->editMode
                ? __('Zaktualizowano')
                : __('Utworzony'),
            $description = $this->editMode
                ? __('Zaktualizowano stan :name',['name' => $this->condition->name])
                : __('Dodano stan :name',['name' => $this->condition->name])
        );
        $this->editMode = true;
    }
}
