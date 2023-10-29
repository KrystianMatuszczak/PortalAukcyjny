<?php

namespace App\Http\Livewire\Categories;

use Livewire\WithPagination;
use App\Models\Category;
use WireUi\Traits\Actions;
use LaravelViews\Facades\Header;
use LaravelViews\Views\TableView;
use Illuminate\Contracts\Database\Eloquent\Builder;
use App\Http\Livewire\Categories\Filters\SoftDeleteFilter;
use App\Http\Livewire\Categories\Actions\EditCategoryAction;
use App\Http\Livewire\Categories\Actions\RestoreCategoryAction;
use App\Http\Livewire\Categories\Actions\SoftDeleteCategoryAction;
use App\Http\Livewire\Traits\SoftDelete;
use App\Http\Livewire\Traits\Restore;

class CategoriesTableView extends TableView
{
  use Actions;
  use SoftDelete;
  use Restore;
  use WithPagination;
    /**
     * Sets a model class to get the initial data
     */
    protected $model = Category::class;

    public $searchBy = [
      'name',
      'created_at',
      'updated_at',
      'deleted_at',
    ];
    protected $paginate = 5;

    public function repository(): Builder

    {
        return Category::query()->withTrashed();
    }

    /**
     * Sets the headers of the table as you want to be displayed
     *
     * @return array<string> Array of headers
     */
    public function headers(): array
    {
        return [
          Header::title('Nazwa')->sortBy('name'),
          Header::title(__('translation.attributes.created_at'))->sortBy('created_at'),
          Header::title(__('categories.atrributes.updated_at'))->sortBy('updated_at'),
          Header::title(__('translation.attributes.deleted_at'))->sortBy('deleted_at'),
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
          $model->name,
          $model->created_at,
          $model->updated_at,
          $model->deleted_at,
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
            new EditCategoryAction('categories.edit', __('Edytuj')),
            new SoftDeleteCategoryAction(),
            new RestoreCategoryAction(),
        ];
    }

    public function softDelete(int $id)
    {
        $category = Category::find($id);
        $category -> delete();
        $this->notification()->success(
            $title = __('Usunięto'),
            $description = __('Usunięto kategorię :name',[
                'name'=>$category->name,
            ])
            );
    }

    public function restore(int $id)
    {
        $category = Category::withTrashed()->find($id);
        $category->restore();
        $this->notification()->success(
            $title=__('Przywrócono'),
            $description=__('Przywrócono kategorię :name',[
                'name'=>$category->name,
            ])
        );
    }
}
