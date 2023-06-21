<?php


namespace App\Queries;


use App\Models\Faculty;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

final class FacultyQueryBuilder
{
    private Builder $model;

    public function __construct()
    {
        $this->model = Faculty::query();
    }

    public function getModel($facultyId): Model|null
    {
        return $this->model
            ->where('id', $facultyId)
            ->first();
    }

    public function getModels(): Collection
    {
        return $this->model->get();
    }
}
