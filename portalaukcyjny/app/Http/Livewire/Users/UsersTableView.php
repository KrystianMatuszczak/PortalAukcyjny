<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use LaravelViews\Facades\Header;
use LaravelViews\Views\TableView;
use App\Http\Livewire\Users\Actions\AssignWorkerRoleAction;
use App\Http\Livewire\Users\Actions\BlockUserAction;
use App\Http\Livewire\Users\Actions\RemoveWorkerRoleAction;
use App\Http\Livewire\Users\Actions\MarkUserAsTrustedAction;
use App\Http\Livewire\Users\Actions\UnblockUserAction;
use App\Http\Livewire\Users\Actions\UnmarkUserAsTrustedAction;
use App\Http\Livewire\Users\Filters\UserRoleFilter;

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
            Header::title('Imie i nazwisko')->sortBy('name'),
            Header::title('Adres email')->sortBy('email'),
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
    protected function filters()
    {
        return [
            new UserRoleFilter
        ];
    }
    protected function actionsByRow()
    {
        return [
            new AssignWorkerRoleAction,
            new RemoveWorkerRoleAction,
            new MarkUserAsTrustedAction,
            new UnmarkUserAsTrustedAction,
            new BlockUserAction,
            new UnblockUserAction
        ];
    }
}
