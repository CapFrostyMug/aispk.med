<?php

namespace App\Http\Controllers;

use App\Facades\ReportFacade;
use App\Services\ReportGeneratorService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

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
        $data = $reportFacade->showRating($request);
        return view('reports.rating.index', $data);
    }

    /**
     * [Method description].
     *
     * @param ReportFacade $reportFacade
     * @param int $facultyId
     * @return BinaryFileResponse
     */
    public function exportRatingToWord(ReportFacade $reportFacade, int $facultyId): BinaryFileResponse
    {
        $fileName = $reportFacade->exportRatingToWord($facultyId);
        return response()->download($fileName . '.docx')->deleteFileAfterSend(true);
    }

    /**
     * [Method description].
     *
     * @param Request $request
     * @param ReportFacade $reportFacade
     * @return View
     */
    public function showUniversalReport(Request $request, ReportFacade $reportFacade): view
    {
        $data = $reportFacade->showUniversalReport($request);
        return view('reports.universal-report.index', $data);
    }

    /**
     * [Method description].
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function exportUniversalReportToExcel(Request $request): RedirectResponse
    {
        (new ReportGeneratorService($request->input()))->store('aispk_universal_report.xlsx');
        return back()->with('success', config('messages.universalReport.success'));
    }

    /**
     * [Method description].
     *
     * @param Request $request
     * @param ReportFacade $reportFacade
     * @return
     */
    public function showStatistics(Request $request, ReportFacade $reportFacade)
    {
        $reportFacade->showStatistics();
    }
}
