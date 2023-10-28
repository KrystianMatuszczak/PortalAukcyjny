<?php

namespace App\Http\Livewire\Users\Actions;

use Illuminate\Support\Facades\Auth;
use LaravelViews\Actions\Action;
use LaravelViews\Views\View;

class UnmarkUserAsTrustedAction extends Action
{
    public $icon = 'user-x';

    public function __construct() {
      parent::__construct();
      $this->title = 'Odbierz status zaufanego sprzedawcy';
    }

    public function handle($model, View $view) {
      $model->unmarkAsTrusted();
      $this->success("Status zaufanego sprzedawcy został odebrany użytkownikowi $model->name");
    }

    public function renderIf($item, View $view) {
      return (Auth::user()->isAdmin() || (Auth::user()->isWorker() && (!$item->hasRole(config('auth.roles.admin'))))) && $item->trusted;
    }
}
