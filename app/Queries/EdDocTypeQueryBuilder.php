<?php


namespace App\Queries;


use App\Models\EducationalDocType;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

final class EdDocTypeQueryBuilder
{
    private Builder $model;

    public function __construct()
    {
        $this->model = EducationalDocType::query();
    }

    public function getModels(): Collection
    {
        return $this->model->get();
    }
}
