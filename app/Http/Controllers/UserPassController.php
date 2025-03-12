<?php

namespace App\Http\Controllers;

use App\Models\UserPass;
use App\Models\SharedPass;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class UserPassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $passwords = Auth::user()->userPasses;
        $receivedPasses = Auth::user()->receivedPasses->map->userPass;

        return view('saved', compact('passwords', 'receivedPasses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'website' => 'required|min:25',
            'username' => 'required',
            'password' => 'required',
        ]);
        $pass = new UserPass();
        $pass->app_name = $request->website;
        $pass->username = $request->username;
        // AES-256 encryption through crypt
        $pass->password = Crypt::encryptString($request->password);
        $pass->user_id = Auth::id();
        // dd($pass);
        $pass->save();
        return redirect()->route('pass-manage.index')->with('success', 'Password saved successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'website' => 'required|min:25',
            'username' => 'required',
            'password' => 'required',
        ]);
        $pass = new UserPass();
        $pass = $pass->where('id', $id)->first();
        $pass->app_name = $request->website;
        $pass->username = $request->username;
        // AES-256 encryption through crypt
        $pass->password = Crypt::encryptString($request->password);
        $pass->user_id = Auth::id();
        // dd($pass);
        $pass->save();
        return redirect()->route('pass-manage.index')->with('success', 'Password saved successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $password = UserPass::where('user_id', Auth::id())->findOrFail($id);
        $password->delete();
        return redirect()->back()->with('success', 'Password deleted successfully.');
    }

    // Get password
    public function getPassword($id)
    {
        $userPass = UserPass::findOrFail($id);

        // Only allow the owner to see their passwords
        if ($userPass->user_id !== Auth::id()) {
            abort(403);
        }

        return view('passwords.show', [
            'password' => Crypt::decryptString($userPass->passwords)
        ]);
    }

    // Open share Page so owner can share password

    public function share($id)
    {
        $password = UserPass::findOrFail($id);

        if ($password->user_id !== auth()->id()) {
            abort(403, 'You can only share your own passwords.');
        }

        $users = User::where('id', '!=', auth()->id())->pluck('email', 'id');
        $sharedWith = $password->sharedWith()->with('sharedWith')->get(); // Keep as SharedPass collection
        return view('share', compact('password', 'users', 'sharedWith'));
    }

    // store shared user

    public function storeShare(Request $request, $id)
    {
        $password = UserPass::findOrFail($id);

        // Ensure only the owner can share
        if ($password->user_id !== Auth::id()) {
            abort(403, 'You can only share your own passwords.');
        }

        $request->validate([
            'shared_with_user_id' => 'required|exists:users,id|not_in:' . Auth::id(),
        ]);

        SharedPass::create([
            'user_pass_id' => $password->id,
            'shared_with_user_id' => $request->shared_with_user_id,
            'shared_by_user_id' => Auth::id(),
        ]);

        return redirect()->route('pass-manage.index')->with('success', 'Password shared successfully.');
    }


    // remove shared user
    public function removeShare($id, $sharedPassId)
    {
        $password = UserPass::findOrFail($id);

        if ($password->user_id !== Auth::id()) {
            abort(403, 'You can only manage your own passwords.');
        }

        $sharedPass = SharedPass::where('user_pass_id', $password->id)
            ->where('id', $sharedPassId)
            ->firstOrFail();

        $sharedPass->delete();

        return redirect()->back()->with('success', 'Access removed successfully.');
    }
}
