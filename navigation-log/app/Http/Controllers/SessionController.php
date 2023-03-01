<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSessionRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{

    public function create(){
        return view('login', ['dropdownLocations' => \App\Models\Location::get()]);
    }

    public function store(CreateSessionRequest $request){

        $attributes = [
            'username' => $request['username'],
            'password' => $request['password']
        ];

        if (!auth()->attempt($attributes)){
            throw ValidationException::withMessages([
                'username' => 'Your provided email could not be verified',
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
