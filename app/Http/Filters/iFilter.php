<?php


namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

interface iFilter
{
    public function apply(Builder $builder);
}
