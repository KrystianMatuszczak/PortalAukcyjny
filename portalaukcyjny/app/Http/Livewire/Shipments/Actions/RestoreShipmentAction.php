<?php

namespace App\Http\Livewire\Shipments\Actions;

use LaravelViews\Views\View;
use LaravelViews\Actions\Action;



class RestoreShipmentAction extends Action
{
    public $title = '';
    public $icon='trash';

    public function __construct()
    {
        parent::__construct();
        $this->title=__('Przywróć');
    }

    public function handle($model, View $view)
    {
        $view->dialog()->confirm([
            'title'=>__('Przywracanie metody'),
            'description'=>__('Czy na pewno przywrócic metodę :name',[
                'name'=>$model->name
            ]),
            'icon'=>'question',
            'iconColor'=>'text-gree-500',
            'accept'=>[
                'label'=>__('Tak'),
                'method'=>'restore',
                'params'=>$model->id,
            ],
            'reject'=>[
                'label'=>__('Nie'),
            ]
        ]);
    }

    public function renderIf($model, View $view)
    {
        return request()->user()->can('restore',$model);
    }
}
