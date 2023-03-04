<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use App\Models\Location;
use App\Models\Conversation;
use Illuminate\Http\Request;
use App\Models\UserConversation;
use App\Http\Requests\CreateLeavingRequest;
use App\Http\Requests\CreateMessageRequest;
use App\Http\Requests\CreateConversationRequest;


class ConversationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   $id = auth()->user()->id;
        return view('conversations/index', ['user' => User::find($id),'dropdownLocations' => Location::get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("/conversations/create", ["friends" => User::find(auth()->user()->id)->friendsaccepted()]);
    }

    public function start(CreateConversationRequest $request)
    {

        $info = Conversation::create([
            'name' => $request['name']
        ]);

        $info->save;

        UserConversation::create([
            'conversation_id' => $info->id,
            'user_id' => auth()->user()->id
        ]);

        foreach($request['user_id'] as $user)
        {
        UserConversation::create([
            'conversation_id' => $info->id,
            'user_id' => $user
        ]);
        }

    return redirect("/conversation/$info->id");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateMessageRequest $request)
    {
        Message::Create([
            'user_id' => $request['user_id'],
            'conversation_id' => $request['conversation_id'],
            'content' => $request['content']
        ]);

        return redirect("/conversation/$request[conversation_id]");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if(count(UserConversation::where('conversation_id', $id)->where('user_id', auth()->user()->id)->get()) === 0){
            return redirect('/inbox');
        }
        
        return view('conversations/show', ['conversation' => Conversation::find($id), 'dropdownLocations' => Location::get()]);
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

    public function leave(CreateLeavingRequest $request){
        
        UserConversation::where('user_id', $request['user_id'])
        ->where('conversation_id', $request['conversation_id'])->delete();

        return redirect('/inbox');

}
}