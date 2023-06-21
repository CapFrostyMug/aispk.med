<?php


namespace App\Queries;


use App\Models\Decree;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

final class DecreeQueryBuilder
{
    private Builder $model;

    public function __construct()
    {
        $this->model = Decree::query();
    }

    public function getModels(): Collection
    {
        return $this->model->get();
    }
}
