<?php

namespace App\Http\Controllers;

use App\Facades\ListFacade;
use Illuminate\Http\Request;

class ListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param ListFacade $listFacade
     * @return \Illuminate\View\View
     */
    public function index(ListFacade $listFacade)
    {
        $data = $listFacade->index();

        return view('lists.index', ['faculties' => $data['faculties']]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \Illuminate\Http\Request $request
     * @param ListFacade $listFacade
     * @return \Illuminate\View\View
     */
    public function show(Request $request, ListFacade $listFacade)
    {
        $data = $listFacade->show($request);

        return view('lists.index', [
            'faculties' => $data['faculties'],
            'students' => $data['students'],
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
