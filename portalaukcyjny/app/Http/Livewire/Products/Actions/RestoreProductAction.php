<?php

namespace App\Http\Livewire\Products\Actions;

use Illuminate\Database\Eloquent\Model;
use App\Http\Livewire\Actions\RestoreAction;


class RestoreProductAction extends RestoreAction
{
    protected function dialogTitle(): String
    {
        return __('Czy chcesz przywrócić produkt?');
    }

    protected function dialogDescription(Model $model): String
    {
        return __('Napewno?',[
            'name' => $model->name
        ]);
    }
}
