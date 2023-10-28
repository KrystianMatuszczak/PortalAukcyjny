<?php

namespace App\Http\Livewire\Users\Actions;

use Illuminate\Support\Facades\Auth;
use LaravelViews\Actions\Action;
use LaravelViews\Views\View;

class RemoveWorkerRoleAction extends Action
{
    public $title = '';
    public $icon = 'user-minus';
    public function __construct() {
        parent::__construct();
        $this->title = 'Usuń role pracownika';
    }
    public function handle($model, View $view)
    {
        $model->removeRole(config('auth.roles.worker'));
        $this->success('Usunięto role pracownika');
    }
    public function renderIf($item, View $view)
    {
        return Auth::user()->isAdmin() && $item->hasRole(config('auth.roles.worker'));
    }
}
