<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonalFileController extends Controller
{
    public function search()
    {
        return view('personal-files.search');
    }

    public function create(Request $request)
    {
        if ($request->isMethod('post')) {

            dump($request->except('_token'));
            $request->flash();
            //return redirect()->route('personal-file.create');
            //return view('personal-files.form');

        }
        return view('personal-files.form');
    }

    public function edit()
    {
        return view('personal-files.form');
    }

    public function view()
    {
        return view('personal-files.form');
    }
}
