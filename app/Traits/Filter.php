<?php


namespace App\Traits;

use App\Http\Filters\iFilter;
use Illuminate\Database\Eloquent\Builder;

trait Filter
{
    /**
     * @param Builder $builder
     * @param iFilter $filter
     *
     * @return Builder
     */
    public function scopeFilter(Builder $builder, iFilter $filter): Builder
    {
        $filter->apply($builder);

        return $builder;
    }
}
