<?php

namespace App\Facades\Admin;

use App\Facades\Facade;
use App\Models\Admin\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

final class CategoryFacade extends Facade
{
    protected object $category;

    public function __construct
    (
        Category $category = null,
    )
    {
        $this->category = $category ?: new Category();
    }

    /**
     * Display a listing of the resource.
     *
     * @return array
     */
    public function index(): array
    {
        return ['data' => $this->category->all()];
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        // TODO: Implement create() method.
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param array $validatedData
     * @return void|object
     */
    public function store(array $validatedData)//: void|object
    {
        try {
            DB::transaction(function () use ($validatedData) {
                DB::table($validatedData['table'])->insert(['name' => $validatedData['newItem']]);
            }, 3);

        } catch (\Exception $exception) {
            return $exception;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @return array|null
     */
    public function show(Request $request): array|null
    {
        $table = $request->input('table');

        $response = DB::table('categories')->where('table', $table)->get();

        return $response->isNotEmpty() ? ['data' => DB::table($table)->get()] : null;
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit()
    {
        // TODO: Implement edit() method.
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update()
    {
        // TODO: Implement update() method.
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @param Request|null $request
     * @return array|object
     */
    public function destroy(int $id, Request $request = null)//: void|object
    {
        $permissionRemove = DB::table($request->query('table'))
            ->where('id', '=', $id)
            ->first()->permission_remove;

        if ($permissionRemove) {
            try {
                DB::transaction(function () use ($id, $request) {
                    DB::table($request->query('table'))->where('id', '=', $id)->delete();
                }, 3);

                return [];

            } catch (\Exception $exception) {
                return $exception;
            }
        }

        return new \Exception();
    }
}
