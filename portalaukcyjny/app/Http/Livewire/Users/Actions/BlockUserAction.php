<?php

namespace App\Http\Livewire\Users\Actions;

use Illuminate\Support\Facades\Auth;
use LaravelViews\Actions\Action;
use LaravelViews\Views\View;

class BlockUserAction extends Action
{
    public $icon = 'lock';

    public function __construct() {
      parent::__construct();
      $this->title = 'Zablokuj użytkownika';
    }

    public function handle($model, View $view) {
      $model->block();
      $this->success("Użytkownik $model->name został zablokowany");
    }

    public function renderIf($item, View $view) {
      return ((Auth::user()->isAdmin() || (Auth::user()->isWorker() && !$item->hasRole(config('auth.roles.worker')))) && !$item->hasRole(config('auth.roles.admin'))
        && Auth::user()->id != $item->id) && !$item->blocked;
    }
}
