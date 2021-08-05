<?php

namespace App\Http\Controllers;

use App\Models\Private_Message;
use Illuminate\Http\Request;

class PrivateMessageController extends Controller
{
    public function index()
    {
        return view("profile.privateMessages", [
            "PrivateMessages" => Private_Message::with("participants", 'author')->whereHas("participants", function ($q) {
                $q->where('participant_id', auth()->user()->id);
            })->orWhere('creator', auth()->user()->id)->get()
        ]);
    }
}
