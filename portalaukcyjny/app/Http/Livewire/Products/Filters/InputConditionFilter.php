<?php

namespace App\Http\Livewire\Products\Filters;

use LaravelViews\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use LaravelViews\Filters\BooleanFilter;

use function PHPSTORM_META\map;

class InputConditionFilter extends BooleanFilter
{
    public $title = '';

    public function __construct()
    {
        parent::__construct();
        $this->title = __('Stan');
    }

    public function apply(Builder $query, $value, $request): Builder
    {
        if($value['Nowy'])
        {
        return $query->whereHas('conditions', function ($query) use ($value){
            $query->where('name', 'like', '%' . 'Nowy' . '%');
        });
        }
        if($value['Używany - Jak Nowy'])
        {
        return $query->whereHas('conditions', function ($query) use ($value){
            $query->where('name', 'like', '%' . 'Używany - Jak Nowy' . '%');
        });
        }
        if($value['Używany - Bardzo Dobry'])
        {
        return $query->whereHas('conditions', function ($query) use ($value){
            $query->where('name', 'like', '%' . 'Używany - Bardzo Dobry' . '%');
        });
        }
        if($value['Używany - Dobry'])
        {
        return $query->whereHas('conditions', function ($query) use ($value){
            $query->where('name', 'like', '%' . 'Używany - Dobry' . '%');
        });
        }
        if($value['Zepsuty'])
        {
        return $query->whereHas('conditions', function ($query) use ($value){
            $query->where('name', 'like', '%' . 'Zepsuty' . '%');
        });
        }
        if($value['Używany - Akceptowalny'])
        {
        return $query->whereHas('conditions', function ($query) use ($value){
            $query->where('name', 'like', '%' . 'Używany - Akceptowalny' . '%');
        });
        }

        return $query;
    }
    public function options()
    {
        return [
            'Nowy' => 'Nowy',
            'Używany - Jak Nowy' => 'Używany - Jak Nowy',
            'Używany - Bardzo Dobry' => 'Używany - Bardzo Dobry',
            'Używany - Dobry'=> 'Używany - Dobry',
            'Używany - Akceptowalny' => 'Używany - Akceptowalny',
            'Zepsuty'=>'Zepsuty'
        ];
    }
}
