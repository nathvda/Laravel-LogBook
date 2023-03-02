<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Location;
use App\Http\Requests\CreateUserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user/profile', ['dropdownLocations' => Location::get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user/create', ['dropdownLocations' => Location::get()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateUserRequest $request)
    {

        $user = User::create([
            'name' => $request['name'],
            'username' => $request['username'],
            'email'=> $request['email'],
            'password' => bcrypt($request['password'])
        ]);

        auth()->login($user);

        session()->flash('success', 'Your account was successfully created');

        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('/user/index', ['users' => User::find($id), 'dropdownLocations' => Location::get()]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
