<?php

namespace App\Http\Controllers;

use App\Facades\ListFacade;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ListController extends Controller
{
    public function index()
    {
        //
    }

    // TODO Объединить методы search и find в один?
    public function search(ListFacade $listFacade): View
    {
        $faculties = $listFacade->search();

        return view('lists.index', [
            'faculties' => $faculties,
        ]);
    }

    public function find(Request $request, ListFacade $listFacade)
    {
        $faculties = $listFacade->search();
        $students = $listFacade->find($request);

        return view('lists.index', [
            'faculties' => $faculties,
            'students' => $students,
        ]);
    }
}
