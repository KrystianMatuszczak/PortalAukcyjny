<?php

namespace App\Http\Livewire\Categories;

use App\Models\Category;
use LaravelViews\Views\TableView;

class CategoriesTableView extends TableView
{
    /**
     * Sets a model class to get the initial data
     */
    protected $model = Category::class;

    public $searchBy = [
      'name'
    ];

    /**
     * Sets the headers of the table as you want to be displayed
     *
     * @return array<string> Array of headers
     */
    public function headers(): array
    {
        return [
          'Nazwa'
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
