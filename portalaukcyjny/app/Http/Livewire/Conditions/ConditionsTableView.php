<?php

namespace App\Http\Livewire\Conditions;

use Livewire\WithPagination;
use LaravelViews\Facades\Header;
use App\Models\Condition;
use LaravelViews\Views\TableView;

class ConditionsTableView extends TableView
{
  use WithPagination;
    /**
     * Sets a model class to get the initial data
     */
    protected $model = Condition::class;

    public $searchBy = [
      'name'
    ];
    protected $paginate = 5;

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
}
