<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use Illuminate\Http\Request;

class FriendController extends Controller
{
    public function store(String $id, String $id2){
        
        Friend::create([
            'first_user_id' => $id,
            'second_user_id' => $id2
        ]);

        return redirect("/viewprofile/$id2")->with('success', 'Request sent');
    }

    public function destroy(String $id, String $id2){
        
        Friend::create([
            'first_user_id' => $id,
            'second_user_id' => $id2
        ]);

        return redirect("/viewprofile/$id2")->with('success', 'Request sent');
    }
}
