<?php

namespace App\Http\Controllers;

use App\Models\SharedPass;
use App\Models\UserPass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class FrontendController extends Controller
{
    public function dashboard()
    {
        $userId = Auth::id();

        $totalPassword = UserPass::where('user_id', $userId)->count();
        $totalSharedPassword = SharedPass::count();
        $recentPasswords = UserPass::where('user_id', $userId)->latest()->limit(3)->get();

        // Get all user's decrypted passwords and count reuses
        $userPasswords = UserPass::where('user_id', $userId)->get();

        $passwordMap = [];

        foreach ($userPasswords as $entry) {
            try {
                $decrypted = Crypt::decrypt($entry->password);
            } catch (\Exception $e) {
                continue;
            }

            if (!isset($passwordMap[$decrypted])) {
                $passwordMap[$decrypted] = 0;
            }

            $passwordMap[$decrypted]++;
        }

        // Only count passwords used more than once
        $reusedPasswords = array_filter($passwordMap, fn($count) => $count > 1);
        $totalReusedPasswords = count($reusedPasswords);

        return view('admin.index', compact(
            'totalPassword',
            'totalSharedPassword',
            'recentPasswords',
            'totalReusedPasswords'
        ));
    }
}
