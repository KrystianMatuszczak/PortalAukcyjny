<?php

namespace App\Http\Livewire\Categories\Actions;

use LaravelViews\Views\View;
use LaravelViews\Actions\Action;


class SoftDeleteCategoryAction extends Action
{
    public $title = '';
    public $icon = 'trash-2';

    public function __construct()
    {
        parent::__construct();
        $this->title = __('Usuń');
    }

    public function handle($model, View $view)
    {
        $view->dialog()->confirm([
            'title'=>__('Usuwanie kategorii'),
            'description'=>__('Czy na pewno usunąć kategorię :name',[
                'name'=>$model->name
            ]),
            'icon'=>'question',
            'iconColor'=>'text-red-500',
            'accept'=>[
                'label'=>__('Tak'),
                'method'=>'softDelete',
                'params'=>$model->id,
            ],
            'reject'=>[
                'label'=>__('Nie'),
            ]
        ]);
    }
    public function renderIf($model, View $view)
    {
        return request()->user()->can('delete',$model);
    }
}
