<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;

class FriendController extends Controller
{
    public function store(String $id, String $id2){

        $isFriend = Friend::where('first_user_id', $id)->where('second_user_id', $id2)->get(); 
        $isFriend2 = Friend::where('second_user_id', $id)->where('first_user_id', $id2)->get(); 

        if(count($isFriend) != 0 OR count($isFriend2) != 0 OR $id === $id2){
            return redirect("/viewprofile/$id2")->with('error', 'The request couldn\'t be sent');
        } else {
            
        Friend::create([
            'first_user_id' => $id,
            'second_user_id' => $id2
        ]);

        Notification::create([
            'user_id' => $id2,
            'notificationtype_id' => 1
        ]);
    }

        return redirect("/viewprofile/$id2")->with('success', 'Request sent');
    }

    public function update(String $id, String $id2){

        $idk2 = DB::table('friends')
        ->where('first_user_id', $id2)
        ->where('second_user_id', $id)->update([
            'accepted' => true,
        ]);

        Notification::create([
            'user_id' => $id2,
            'notificationtype_id' => 2
        ]);

        return redirect("/viewprofile/$id")->with('success', 'Request accepted');

    }

    public function destroy(String $id, String $id2){
        
        $idk = DB::table('friends')
        ->where('first_user_id', $id)
            ->where('second_user_id', $id2)
            ->delete();

        $idk2 = DB::table('friends')
        ->where('first_user_id', $id2)
        ->where('second_user_id', $id)
        ->delete();

        return redirect("/viewprofile/$id")->with('success', 'Removed from friends');
    }

    public function decline(String $id, String $id2){
        
        $idk = DB::table('friends')
        ->where('first_user_id', $id)
            ->where('second_user_id', $id2)
            ->delete();

        $idk2 = DB::table('friends')
        ->where('first_user_id', $id2)
        ->where('second_user_id', $id)
        ->delete();

        return redirect("/viewprofile/$id2")->with('success', 'Removed from friends');
    }

}
