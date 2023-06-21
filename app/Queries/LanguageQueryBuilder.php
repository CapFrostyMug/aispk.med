<?php


namespace App\Queries;


use App\Models\Language;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

final class LanguageQueryBuilder
{
    private Builder $model;

    public function __construct()
    {
        $this->model = Language::query();
    }

    public function getModels(): Collection
    {
        return $this->model->get();
    }
}
