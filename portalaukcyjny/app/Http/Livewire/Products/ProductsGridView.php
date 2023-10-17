<?php

namespace App\Http\Livewire\Products;

use App\Models\Product;
use LaravelViews\Views\GridView;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Livewire\Products\Actions\EditProductAction;
use App\Http\Livewire\Products\Actions\RestoreProductAction;
use App\Http\Livewire\Products\Actions\SoftDeleteProductAction;

class ProductsGridView extends GridView
{
    protected $model = Product::class;

    protected $paginate = 12;
    public $maxCols = 3;

    public $searchBy = [
        'name',
        'categories',
        'descriptions'
      ];

    public $cardComponent = 'livewire.products.grid-view-item';

    public function repository(): Builder
    {
        $query = Product::query()
            ->with(['categories']);
        if(request()->user()->can('manage', Product::class))
        {
            $query->withTrashed();
        }
        return $query;
    }

    public function card($model)
    {
        return[
            'image' => Storage::url('no-img.png'),
            'title' =>$model->name,
            'description' => $model->description,
            'categories' => $model->categories,
        ];
    }

    public function getPaginatedQueryProperty()
    {
        return $this->query->paginate($this->paginate);
    }

    protected function actionsByRow()
    {
        if(request()->user()->can('manage', Product::class))
        {
            return[
                new EditProductAction(
                    'products.edit', 
                    __('Edytuj')
                ),
                new SoftDeleteProductAction(),
                new RestoreProductAction(),
            ];
        } 
    }
}