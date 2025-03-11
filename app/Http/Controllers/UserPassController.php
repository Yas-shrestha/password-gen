<?php

namespace App\Http\Controllers;

use App\Models\UserPass;
use Illuminate\Http\Request;

class UserPassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('saved');
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(UserPass $userPass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserPass $userPass)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserPass $userPass)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserPass $userPass)
    {
        //
    }
}
