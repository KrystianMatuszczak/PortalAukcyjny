<?php

namespace App\Http\Repositories;

use App\Models\Condition;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class ConditionRepository
{
    public function async(String|null $search, array|null $selected): Collection
    {
        return Condition::query()
            ->select('id','name')
            ->orderBy('name')
            ->when(
                $search,
                fn (Builder $query) => $query->where('name','like',"%{$search}%")
            )->when(
                $selected,
                fn (Builder $query) => $query->whereIn(
                    'id',
                    array_map(
                        fn (array $item) => $item['id'],
                        array_filter(
                            $selected,
                            fn ($item) => (is_array($item) && isset($item['id']))
                        )
                    )
                        ),
                        fn (Builder $query) => $query->limit(Condition::count())
            )->get();
    }
}
