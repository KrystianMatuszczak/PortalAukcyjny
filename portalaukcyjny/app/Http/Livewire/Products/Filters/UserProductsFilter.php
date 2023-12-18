<?php

namespace App\Http\Livewire\Products\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use LaravelViews\Filters\Filter;

class UserProductsFilter extends Filter
{
    public $title = '';
    public function __construct()
    {
        parent::__construct();
        $this->title = 'Moje produkty';
    }

    public function apply(Builder $query, $value, $request): Builder
    {
        if($value == 1)
        {
            return $query->where('user_id', '=', Auth::user()->id);
        }
        return $query;
    }

    public function options():Array {
        return [ 'Tak' => 1, 'Nie' => 0]; 
    }
}
