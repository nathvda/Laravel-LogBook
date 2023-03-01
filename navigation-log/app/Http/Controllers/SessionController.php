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

        $attributes = $request['data'];

        if (!auth()->attempt($attributes)){
            throw ValidationException::withMessages([
                'email' => 'Your provided email could not be verified']
            );
        }

        session()->regenerate();
        return redirect('/')->with('success', 'It\'s been a while, how are you doing ?');
    
    }
    
    public function destroy(){
        auth()->logout();

        return redirect('/')->with('success', 'You successfully logged out');
    }
}
