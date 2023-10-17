<?php

namespace App\Http\Livewire\Actions;

use LaravelViews\Views\View;
use LaravelViews\Actions\Action;
use Illuminate\Database\Eloquent\Model;


class SoftDeleteAction extends Action
{
    public $title = '';

    public function __construct(?String $title = null)
    {
        parent::__construct();
        if ($title !== null) {
            $this->title = $title;
        } else {
            $this->title = __('Usuń');
        }
        
    }

    public $icon = 'trash-2';

    protected function dialogTitle(): String
    {
        return __('Czy chcesz usunac?');
    }

    protected function dialogDescription(Model $model): String
    {
        return __('Soft Delete', ['model' => $model]);
    }

    public function handle($model, View $view)
    {
        $view->dialog()->confirm([
            'title' => $this->dialogTitle(),
            'description' => $this->dialogDescription($model),
            'icon' => 'question',
            'iconColor' => 'text-red-500',
            'accept' => [
                'label' => __('Tak'),
                'method' => 'softDelete',
                'params' => $model->id,
            ],
            'reject' => [
                'label' => __('Nie'),
            ]
        ]);
    }
    public function renderIf($model, View $view)
    {
        return request()->user()->can('delete',$model);
    }
}