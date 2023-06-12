<?php

namespace App\Http\Controllers;

use App\Facades\PersonalFileFacade;
use Illuminate\Http\Request;

class PersonalFileController extends Controller
{
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(PersonalFileFacade $personalFileFacade)
    {
        $secondaryModels = $personalFileFacade->create();
        return view('personal-files.form.create', $secondaryModels);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, PersonalFileFacade $personalFileFacade)
    {
        $request->flash();

        if (!empty($personalFileFacade->store($request))) {
            return back()->with('error', '');
        }

        return redirect()->route('admin.users-management.index')->with('success', '');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        //
    }

    public function search()
    {
        $student = null;

        return view('personal-files.search.editSearch', [
            'student' => $student,
        ]);
    }

    public function find()
    {
        //
    }
}
