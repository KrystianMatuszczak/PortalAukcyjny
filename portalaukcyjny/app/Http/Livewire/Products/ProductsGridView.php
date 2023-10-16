<?php

namespace App\Http\Livewire\Products;

use App\Models\Product;
use LaravelViews\Views\GridView;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;

class ProductsGridView extends GridView
{
    protected $model = Product::class;

    protected $paginate = 20;
    public $maxCols = 3;

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
}