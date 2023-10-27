<?php

namespace App\Http\Livewire\Users\Actions;

use Illuminate\Support\Facades\Auth;
use LaravelViews\Actions\Action;
use LaravelViews\Views\View;

class AssignWorkerRoleAction extends Action
{
    public $title = '';
    public $icon = 'user-plus';

    public function __construct() {
     parent::__construct();
     $this->title = 'Dodaj pracownika';
    }

    public function handle($model, View $view)
    {
        $model->assignRole(config('auth.roles.worker'));
        $this->success('Dodano role pracownika');
    }

    public function renderIf($item, View $view)
    {
        return Auth::user()->isAdmin() && !$item->hasRole(config('auth.roles.worker'));
    }
}
