<?php

namespace App\Http\Livewire\Users\Actions;

use Illuminate\Support\Facades\Auth;
use LaravelViews\Actions\Action;
use LaravelViews\Views\View;

class UnblockUserAction extends Action
{
    public $icon = 'unlock';

    public function __construct() {
      parent::__construct();
      $this->title = 'Odblokuj użytkownika';
    }

    public function handle($model, View $view) {
      $model->unblock();
      $this->success("Użytkownik $model->name został odblokowany");
    }

    public function renderIf($item, View $view) {
      return ((Auth::user()->isAdmin() || (Auth::user()->isWorker() && !$item->hasRole(config('auth.roles.worker')))) && !$item->hasRole(config('auth.roles.admin'))
        && Auth::user()->id != $item->id) && $item->blocked;
      }
}