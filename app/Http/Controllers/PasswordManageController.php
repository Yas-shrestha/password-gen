<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasswordManageController extends Controller
{
    public function index()
    {
        return view('generatePass');
    }
}
