<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function message(){
        $messages = Message::all();
        return view('backend.message.message', get_defined_vars());
    }

    public function messageDelete(Message $message){
        $message->delete();
        return back()->with('delete_success', 'Video deleted successfully');
    }
}
