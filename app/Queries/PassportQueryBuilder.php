<?php


namespace App\Queries;


use App\Interfaces\iQueryBuilder;
use App\Models\Passport;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

final class PassportQueryBuilder implements iQueryBuilder
{
    private Builder $model;

    public function __construct()
    {
        $this->model = Passport::query();
    }

    public function getModel(Request $request): Model|null
    {
        return $this->model->firstWhere('number', $request->passportNumber);
    }

    public function getModels(): Collection
    {
        return $this->model->get();
    }

    public function create(Request $request): Model
    {
        return $this->model->create([
            'birthday' => $request->birthday,
            'birthplace' => $request->birthplace,
            'number' => $request->passportNumber,
            'gender' => $request->gender,
            'nationality_id' => $request->nationality,
            'issue_by' => $request->issueBy,
            'issue_date' => $request->issueDatePassport,
            'address_registered' => $request->addressRegistered,
            'address_residential' => $request->addressResidential,
        ]);
    }
}
