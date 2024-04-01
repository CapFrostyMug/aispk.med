<?php

namespace App\Http\Controllers;

use App\Facades\ReportFacade;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ReportController extends Controller
{
    /**
     * [Method description].
     *
     * @param Request $request
     * @param ReportFacade $reportFacade
     * @return View
     */
    public function showRating(Request $request, ReportFacade $reportFacade): view
    {
        $data = $reportFacade->generateRating($request);
        return view('reports.rating.index', $data);
    }
}
