<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\NewMessage;
use Auth;
use Illuminate\Support\Facades\Broadcast;

class Messages extends Controller
{
    public function storeMessage (Request $request)
    {

        Broadcast::event(new NewMessage($request->user, $request->content))->toOthers();

        return response()->json(['message' => $request->content]);
    }
}
