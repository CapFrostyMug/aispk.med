<?php

namespace App\Http\Controllers;

use App\Queries\PersonalFileQueryBuilder;
use Illuminate\Http\Request;

class PersonalFileController extends Controller
{
    public function create(Request $request, PersonalFileQueryBuilder $builder)
    {
        if ($request->isMethod('post')) {

            $request->flash();

            $builder->create($request);

            return redirect()->route('personal-file.create');

        }

        $relatedModels = $builder->getRelatedModels();

        return view('personal-files.form.create', $relatedModels);
    }

    public function edit(Request $request)
    {
        if ($request->isMethod('post')) {
            //
        }

        dump('Hello World!');
    }

    public function search(Request $request, PersonalFileQueryBuilder $builder)
    {
        $student = null;

        if ($request->isMethod('post')) {

            $search = $request->input('search', '');

            if (empty($search)) {
                return redirect()->route('personal-file.edit-search');
            }

            $student = $builder->search($search);

        }

        return view('personal-files.search.editSearch', [
            'student' => $student,
        ]);
    }
}
