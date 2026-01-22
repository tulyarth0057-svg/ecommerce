<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\MessageSent;

class ChatController extends Controller
{
    public function send(Request $request)
    {
        event(new MessageSent($request->message));
        return response()->json(['success' => true]);
    }
}
