<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\FinancingType;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(Request $request) // Метод Контроллера одиночного действия
    {
        if ($request->isMethod('post')) {

            dd($request->except('_token'));

            $request->flash();

            return redirect()->route('test');

        }

        $faculties = Faculty::all();
        $financing = FinancingType::all();

        return view('test', [
            'faculties' => $faculties,
            'financing' => $financing,
        ]);
    }
}
