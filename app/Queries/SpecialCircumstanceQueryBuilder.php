<?php


namespace App\Queries;


use App\Models\SpecialCircumstance;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

final class SpecialCircumstanceQueryBuilder
{
    private Builder $model;

    public function __construct()
    {
        $this->model = SpecialCircumstance::query();
    }

    public function getModels(): Collection
    {
        return $this->model->get();
    }
}
