<?php

namespace App\Http\Livewire\Products;

use App\Models\Product;
use WireUi\Traits\Actions;
use LaravelViews\Views\GridView;
use App\Http\Livewire\Traits\Restore;
use Illuminate\Support\Facades\Storage;
use App\Http\Livewire\Traits\SoftDelete;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Livewire\Products\Actions\AddToCartAction;
use App\Http\Livewire\Products\Actions\EditProductAction;
use App\Http\Livewire\Products\Actions\RestoreProductAction;
use App\Http\Livewire\Products\Actions\SoftDeleteProductAction;
use App\Http\Livewire\Products\Filters\InputCategoryFilter;
use App\Http\Livewire\Products\Filters\InputConditionFilter;
use App\Http\Livewire\Products\Filters\UserProductsFilter;

class ProductsGridView extends GridView
{
    use Actions;
    use SoftDelete;
    use Restore;

    protected $model = Product::class;

    protected $paginate = 12;
    public $maxCols = 3;

    public $cardComponent = 'livewire.products.grid-view-item';

    public $searchBy = [
        'name',
        'categories.name',
        'conditions.name',
        'price',
        'localization',
        'description',
      ];

    public function repository(): Builder
    {
        $query = Product::query()
            ->with(['categories','conditions']);
        if(request()->user()->can('manage', Product::class))
        {
            $query->withTrashed();
        }
        return $query;
    }

    public function card($model)
    {
        return[
            'image' => $model->imageUrl(),
            'title' =>$model->name,
            'description' => $model->description,
            'categories' => $model->categories,
            'conditions' => $model->conditions,
            'price' => $model->price,
            'amount' => $model->amount,
            'localization' => $model->localization,

        ];
    }
    protected function filters()
    {
        return [ new UserProductsFilter,
    new InputConditionFilter];
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
        } elseif(request()->user()->can('create', Product::class)){
            return [
                new EditProductAction(
                    'products.edit', 
                    __('Edytuj')
                ),
                new SoftDeleteProductAction(),
                new AddToCartAction()
            ];
        } 
    }
}