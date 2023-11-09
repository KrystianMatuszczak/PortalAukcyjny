<?php

namespace App\Http\Livewire\Conditions;

use App\Models\Condition;
use WireUi\Traits\Actions;
use Livewire\WithPagination;
use LaravelViews\Facades\Header;
use LaravelViews\Views\TableView;
use App\Http\Livewire\Traits\Restore;
use App\Http\Livewire\Traits\SoftDelete;
use Illuminate\Contracts\Database\Eloquent\Builder;
use App\Http\Livewire\Conditions\Filters\SoftDeleteFilter;
use App\Http\Livewire\Conditions\Actions\EditConditionAction;
use App\Http\Livewire\Conditions\Actions\RestoreConditionAction;
use App\Http\Livewire\Conditions\Actions\SoftDeleteConditionAction;

class ConditionsTableView extends TableView
{
  use Actions;
  use SoftDelete;
  use Restore;
  use WithPagination;
    /**
     * Sets a model class to get the initial data
     */
    protected $model = Condition::class;

    public $searchBy = [
      'name'
    ];
    protected $paginate = 5;

    public function repository(): Builder

    {
        return Condition::query()->withTrashed();
    }

    /**
     * Sets the headers of the table as you want to be displayed
     *
     * @return array<string> Array of headers
     */
    public function headers(): array
    {
        return [
          Header::title('Nazwa')->sortBy('name')
        ];
    }

    /**
     * Sets the data to every cell of a single row
     *
     * @param $model Current model for each row
     */
    public function row($model): array
    {
        return [
          $model->name
        ];
    }

    protected function filters ()
    {
        return[
            new SoftDeleteFilter,
        ];
    }

    protected function actionsByRow()
    {
        return[
            new EditConditionAction('conditions.edit', __('Edytuj')),
            new SoftDeleteConditionAction(),
            new RestoreConditionAction(),
        ];
    }

    public function softDelete(int $id)
    {
        $condition = Condition::find($id);
        $condition -> delete();
        $this->notification()->success(
            $title = __('Usunięto'),
            $description = __('Usunięto stan :name',[
                'name'=>$condition->name,
            ])
            );
    }

    public function restore(int $id)
    {
        $condition = Condition::withTrashed()->find($id);
        $condition->restore();
        $this->notification()->success(
            $title=__('Przywrócono'),
            $description=__('Przywrócono stan :name',[
                'name'=>$condition->name,
            ])
        );
    }
}
