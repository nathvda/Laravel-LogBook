<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Location;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\ModifyUserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id)
    {
        return view('user/profile', ['user' => User::find($id), 'dropdownLocations' => Location::get()]);
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
        if(auth()->user()->id != $id){
            return redirect ("./viewprofile/$id");
        }

        return view('user/edit', ['user' => User::find($id), 'dropdownLocations' => Location::get()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ModifyUserRequest $request, string $id)
    {

       $image =  $this->uploadImage($request->file('newavatar'), $request['username']);

        User::find($id)->update([
            'name' => $request['name'],
            'username' => $request['username'],
            'avatar' => $image,
            'email' => $request['email'],
        ]);

        return redirect("./viewprofile/$id")->with('success', 'modification effectuée');
    }

    public function uploadImage($image, $name){

        $newImageName = time() . '-' . $name . '.' . $image->extension();

        $image->move(public_path('images'), $newImageName);

        return $newImageName;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::find($id)->delete();
        auth()->logout();

        return redirect('/')->with('success', 'You successfully deleted your account');
    }
}
