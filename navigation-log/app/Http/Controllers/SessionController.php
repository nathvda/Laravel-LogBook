<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateSessionRequest;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{

    public function create(){
        return view('login', ['dropdownLocations' => \App\Models\Location::get()]);
    }

    public function store(CreateSessionRequest $request){

        $attributes = [
            'email' => $request['email'],
            'password' => $request['password']
        ];

        if(!Auth::attempt($attributes, true)){
            throw ValidationException::withMessages([
                'email' => 'Your provided username could not be verified',
                'password' => 'Wrong password']
            );
        }

        session()->regenerate();
        session()->flash('success', 'Its been a while, how are you doing ?');
        return redirect('/');
    
    }
    
    public function destroy(){
        auth()->logout();

        return redirect('/')->with('success', 'You successfully logged out');
    }
}
