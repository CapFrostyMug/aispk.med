<?php

namespace App\Http\Controllers;

use App\Facades\ListFacade;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ListController extends Controller
{
    /**
     * [Method description].
     *
     * @param ListFacade $listFacade
     * @return View
     */
    public function viewAndPrintIndex(ListFacade $listFacade)
    {
        $data = $listFacade->viewAndPrintIndex();

        return view('lists.index', $data);
    }

    /**
     * [Method description].
     *
     * @param Request $request
     * @param ListFacade $listFacade
     * @return View
     */
    public function filter(Request $request, ListFacade $listFacade)
    {
        $data = $listFacade->filter($request);

        return view('lists.index', $data);
    }
}
