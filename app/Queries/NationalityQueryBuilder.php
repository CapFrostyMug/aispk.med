<?php


namespace App\Queries;


use App\Models\Nationality;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

final class NationalityQueryBuilder
{
    private Builder $model;

    public function __construct()
    {
        $this->model = Nationality::query();
    }

    public function getModels(): Collection
    {
        return $this->model->get();
    }
}
