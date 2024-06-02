<?php

namespace App\Http\Controllers;

use App\Facades\ReportFacade;
use App\Services\Reports\ExportReportService;
use App\Services\Reports\ExportStatisticsService;
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
        (new ExportReportService($request->input()))->store('aispk_universal_report.xlsx');
        return back()->with('success', config('messages.universalReport.success'));
    }

    /**
     * [Method description].
     *
     * @param ReportFacade $reportFacade
     * @return View
     */
    public function showStatistics(ReportFacade $reportFacade): view
    {
        $data = $reportFacade->generateStatistics();
        return view('reports.statistics.index', $data);
    }

    /**
     * @param ReportFacade $reportFacade
     * @return RedirectResponse
     */
    public function exportStatisticsToExcel(ReportFacade $reportFacade)//: RedirectResponse
    {
        (new ExportStatisticsService($reportFacade->generateStatistics()))->store('aispk_application_statistics.xlsx');
    }
}
