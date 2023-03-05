<?php

namespace App\Http\Controllers;

use \App\Mail\MailNotify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function index()
    {
        $data = [
            'subject' => 'Navigation Log',
            'body' => 'Hello there!'
        ];

        try {
            Mail::to('/')->send(new MailNotify($data));
            return response()->json(['yey, it worked']);
        } catch (\Exception $th){
            return response()->json(['Oops, something went wrong']);
        }
    }
}
