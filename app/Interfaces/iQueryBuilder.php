<?php


namespace App\Interfaces;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

interface iQueryBuilder
{
    public function getModel(Request $request): Model|null;

    public function getModels();

    public function create(Request $request): Model;
}
