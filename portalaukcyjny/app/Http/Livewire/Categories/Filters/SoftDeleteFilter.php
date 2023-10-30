<?php

namespace App\Http\Livewire\Categories\Filters;

use LaravelViews\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;


class SoftDeleteFilter extends Filter
{
    public $title = '';

    public function __construct()
    {
        parent::__construct();
        $this->title = __('translation.attribute.deleted_at');
    }

    public function apply(Builder $query, $value, $request): Builder 
    {
        if($value == 1){
            return $query->whereNotNull('deleted_at');

        }
        return $query->whereNull('deleted_at');
    }
    public function options()
    {
        return[
            __('translation.yes')=>1,
            __('translation.no')=>0,
        ];
    }
}
