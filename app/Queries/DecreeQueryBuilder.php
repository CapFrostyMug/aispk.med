<?php


namespace App\Queries;


use App\Interfaces\iQueryBuilder;
use App\Models\Decree;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

final class DecreeQueryBuilder implements iQueryBuilder
{
    private Builder $model;

    public function __construct()
    {
        $this->model = Decree::query();
    }

    public function getModel($data, $column = ''): Model|null
    {
        // TODO: Implement getModel() method.
    }

    public function getModels(): Collection
    {
        return $this->model->get();
    }

    public function create(Request $request): Model
    {
        // TODO: Implement create() method.
    }
}
