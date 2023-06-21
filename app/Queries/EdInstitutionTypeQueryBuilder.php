<?php


namespace App\Queries;


use App\Models\EducationalInstitutionType;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

final class EdInstitutionTypeQueryBuilder
{
    private Builder $model;

    public function __construct()
    {
        $this->model = EducationalInstitutionType::query();
    }

    public function getModels(): Collection
    {
        return $this->model->get();
    }
}
