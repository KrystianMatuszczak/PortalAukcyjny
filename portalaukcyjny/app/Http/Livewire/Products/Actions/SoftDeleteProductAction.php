<?php

namespace App\Http\Livewire\Products\Actions;

use Illuminate\Database\Eloquent\Model;
use App\Http\Livewire\Actions\SoftDeleteAction;

class SoftDeleteProductAction extends SoftDeleteAction
{
    protected function dialogTitle(): String
    {
        return __('Czy chcesz usunac produkt?');
    }

    protected function dialogDescription(Model $model): String
    {
        return __('Produkt zostanie usuniety, czy chcesz kontynuowac?',[
            'name' => $model->name
        ]);
    }
}
