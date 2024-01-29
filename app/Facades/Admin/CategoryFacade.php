<?php

namespace App\Facades\Admin;

use App\Facades\Facade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

final class CategoryFacade extends Facade
{
    /**
     * Display a listing of the resource.
     *
     * @return array
     */
    public function index(): array
    {
        return [
            'data' => $this->category->all()
        ];
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
     * @param array $validatedData
     * @return string
     */
    public function store(array $validatedData)
    {
        DB::table($validatedData['table'])->insert(['name' => $validatedData['newItem']]);
    }

    /**
     * Display the specified resource.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return array
     */
    public function show(Request $request, int $id = 0): array
    {
        $table = $request->input('table');
        return ['data' => DB::table($table)->get()];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return array
     */
    public function edit(int $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param array $validatedData
     * @param int $id
     * @return string
     */
    public function update(array $validatedData, int $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return null|string
     */
    public function destroy(int $id)
    {
        //
    }
}
