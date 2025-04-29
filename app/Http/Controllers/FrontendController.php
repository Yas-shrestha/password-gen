<?php

namespace App\Http\Controllers;

use App\Mail\ContactMessageMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Activity;
use App\Models\Contact;
use App\Models\SharedPass;
use App\Models\UserPass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;

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
                $decrypted = Crypt::decryptString($entry->password);

                if (!isset($passwordMap[$decrypted])) {
                    $passwordMap[$decrypted] = 0;
                }

                $passwordMap[$decrypted]++;
            } catch (\Exception $e) {
                // You can log the error to debug:
                Log::error('Decryption failed for password ID: ' . $entry->id);
                continue;
            }
        }

        // Only count passwords used more than once
        $reusedPasswords = array_filter($passwordMap, fn($count) => $count > 1);

        // dd($reusedPasswords);
        $totalReusedPasswords = count($reusedPasswords);
        $activities = Activity::with('user')
            ->where('user_id', $userId)
            ->latest()
            ->take(20)
            ->get();

        return view('admin.index', compact(
            'totalPassword',
            'totalSharedPassword',
            'recentPasswords',
            'totalReusedPasswords',
            'activities'
        ));
    }
    public function contact()
    {
        $contacts = Contact::query()->latest()->paginate(10);
        return view('support', compact('contacts'));
    }
    public function contactStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'nullable|string',
            'message' => 'required|string|max:500',
        ]);

        // Store the contact message in the database
        Contact::create($request->all());



        return redirect()->back()->with('success', 'Message sent successfully!');
    }
}
