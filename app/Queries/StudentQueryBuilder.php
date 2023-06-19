<?php


namespace App\Queries;


use App\Interfaces\iQueryBuilder;
use App\Models\Student;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

final class StudentQueryBuilder implements iQueryBuilder
{
    private Builder $model;

    public function __construct()
    {
        $this->model = Student::query();
    }

    public function getModel($data, $column = ''): Model|null
    {
        return $this->model->find($data);
    }

    public function getModels(): Collection
    {
        //
    }

    public function create(Request $request, $passport = 0): Model
    {
        return $this->model->create([
            'name' => $request->name,
            'surname' => $request->surname,
            'patronymic' => $request->patronymic,
            'passport_id' => $passport->id,
            'phone' => $request->phone,
            'email' => $request->email,
            'language_id' => $request->language,
            'about_me' => $request->aboutMe,
        ]);
    }
}
