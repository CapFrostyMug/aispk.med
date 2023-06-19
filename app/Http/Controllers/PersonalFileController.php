<?php

namespace App\Http\Controllers;

use App\Facades\PersonalFileFacade;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

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
    public function edit(PersonalFileFacade $personalFileFacade, $id)
    {
        $primaryModels = $personalFileFacade->edit($id);
        $secondaryModels = $personalFileFacade->getSecondaryModels();

        if (is_null($primaryModels)) {
            abort(404);
        }

        return view('personal-files.form.edit', $secondaryModels, $primaryModels);
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
        return view('personal-files.search.editSearch');
    }

    public function find(Request $request, PersonalFileFacade $personalFileFacade): View|RedirectResponse
    {
        $student = $personalFileFacade->find($request);

        if (is_null($student)) {
            return back()->with('error', '');
        }

        return view('personal-files.search.editSearch', [
            'student' => $student,
        ]);
    }
}
