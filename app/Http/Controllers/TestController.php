<?php

namespace App\Http\Controllers;

use App\Facades\PersonalFileFacade;
use App\Models\Faculty;
use App\Models\FinancingType;
use App\Models\SpecialCircumstance;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        //
    }

    public function create(PersonalFileFacade $personalFileFacade)
    {
        $secondaryModels = $personalFileFacade->create();
        return view('test', $secondaryModels);
    }

    public function store(Request $request, PersonalFileFacade $personalFileFacade)
    {
        return redirect()->route('admin.users-management.index')->with('success', '');
    }
}
