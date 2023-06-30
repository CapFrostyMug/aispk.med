<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(Request $request)
    {
        if ($request->isMethod('post')) {
            dd($request->except('_token'));
        }

        return view('test');
    }
}
