<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function admin()
    {
        return view('admin');
    }

    public function editor()
    {
        return view('editor');
    }

    public function regular()
    {
        return view('regular');
    }
}
