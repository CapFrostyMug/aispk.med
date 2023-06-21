<?php


namespace App\Queries;


use App\Models\FinancingType;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

final class FinancingQueryBuilder
{
    private Builder $model;

    public function __construct()
    {
        $this->model = FinancingType::query();
    }

    public function getModels(): Collection
    {
        return $this->model->get();
    }
}
