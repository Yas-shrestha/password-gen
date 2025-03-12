<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PasswordManageController extends Controller
{

    public function viewPass()
    {
        $passwords = Auth::user()->userPasses;
        $receivedPasses = Auth::user()->receivedPasses->map->userPass;

        return view('show-pass', compact('passwords', 'receivedPasses'));
    }

    public function index()
    {
        return view('generatePass');
    }
}
