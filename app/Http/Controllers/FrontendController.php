<?php

namespace App\Http\Controllers;

use App\Models\SharedPass;
use App\Models\UserPass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function dashboard()
    {
        $totalPassword = UserPass::where('user_id', Auth::id())->count();
        $totalSharedPassword = SharedPass::count();
        $recentPasswords = UserPass::where('user_id', Auth::id())->latest()->limit(3)->get();
        return view('admin.index', compact('totalPassword', 'totalSharedPassword', 'recentPasswords'));
    }
}
