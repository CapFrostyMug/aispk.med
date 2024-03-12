<?php

namespace App\Http\Controllers;

use App\Facades\ListFacade;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ListController extends Controller
{
    /**
     * Метод позволяет получить список студентов: либо общий, либо отфильтрованный.
     *
     * @param Request $request
     * @param ListFacade $listFacade
     * @return View
     */
    public function getList(Request $request, ListFacade $listFacade): view
    {
        $data = $listFacade->getList($request);
        return  view('lists.index', $data);
    }

    /**
     * Метод для изменения статуса зачисления студентов.
     *
     * @param
     * @param
     * @return
     */
    public function changeEnrollmentData()
    {
        //
    }
}
