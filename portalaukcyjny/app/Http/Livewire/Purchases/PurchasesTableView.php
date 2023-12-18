<?php

namespace App\Http\Livewire\Purchases;

use WireUi\Traits\Actions;
use Livewire\WithPagination;
use LaravelViews\Facades\Header;
use LaravelViews\Views\TableView;
use App\Http\Livewire\Traits\Restore;
use App\Http\Livewire\Traits\SoftDelete;
use Illuminate\Contracts\Database\Eloquent\Builder;
use App\Models\Purchase;

class PurchasesTableView extends TableView
{
  use Actions;
  use SoftDelete;
  use Restore;
  use WithPagination;
    /**
     * Sets a model class to get the initial data
     */
    protected $model = Purchase::class;


    protected $paginate = 5;



    /**
     * Sets the headers of the table as you want to be displayed
     *
     * @return array<string> Array of headers
     */
    public function headers(): array
    {
        return [
            Header::title('Obraz'),
            Header::title('Nazwa')->sortBy('name'),
            Header::title('Cena'),
            Header::title('Ilość'),

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
            $model->products,
            $model->products,
            $model->products,
        ];
    }
}
