<?php

namespace App\Http\Livewire\Users;

use App\Http\Livewire\Users\Actions\AssignWorkerRoleAction;
use App\Http\Livewire\Users\Actions\RemoveWorkerRoleAction;
use App\Models\User;
use LaravelViews\Facades\Header;
use LaravelViews\Views\TableView;
use PhpParser\Node\Expr\FuncCall;

class UsersTableView extends TableView
{
    protected $model = User::class;
    public $searchBy = 
    [
        'name', 
        'email',
        'roles.name',
        'created_at'
    ];
    protected $paginate = 5;
    public function headers(): array
    {
        return[
            Header::title('Imie i nazwisko'),
            Header::title('Adres email'),
            Header::title('Role'),
            Header::title('Utworzono')
        ];
    }

    public function row($model): array
    {
        return [
            $model->name,
            $model->email,
            $model->roles->implode('name', ', '),
            $model->created_at,
        ];
    }

    protected function actionsByRow()
    {
        return [
            new AssignWorkerRoleAction,
            new RemoveWorkerRoleAction
        ];
    }
}
