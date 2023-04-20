<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonalFileController extends Controller
{
    public function search()
    {
        return view('personal-files.search');
    }

    public function create()
    {
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
