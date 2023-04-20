<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.editList');
    }

    public function edit()
    {
        return view('admin.categoryForm');
    }
}
