<?php

namespace App\Http\Controllers;

use App\Models\UserPass;
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
        $passwords = UserPass::query()->where('user_id', Auth::id())->paginate(10);
        // $password = $passwords->password;
        // dd(Crypt::decryptString(trim($password)));

        return view('saved', compact('passwords'));
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
}
