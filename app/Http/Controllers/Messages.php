<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\NewMessage;
use Auth;
use App\Models\Message;
use Illuminate\Support\Facades\Broadcast;

class Messages extends Controller
{   
    public function index (Request $request) {
        try {
            $messages = Message::with(['sender'])->where('room', $request->room)->orderBy('created_at', 'asc')->get();
            return response()->json(['data' => $messages], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Can not found'], 400);
        }

    }

    public function storeMessage (Request $request)
    {
        $message = Message::create([
            'room' => $request->room,
            'sender' => Auth::user()->id,
            'content' => $request->content,
        ]);

        Broadcast::event(new NewMessage($message->load('sender')))->toOthers();

        return response()->json(['message' => $message->load('sender')], 200);
    }
}
