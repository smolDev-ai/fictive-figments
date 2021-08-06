<?php

namespace App\Http\Controllers;

use App\Models\Message_Participant;
use App\Models\Private_Message;
use App\Models\User;
use Illuminate\Http\Request;

class PrivateMessageController extends Controller
{
    public function index()
    {
        return view("profile.privateMessages", [
            "PrivateMessages" => Private_Message::with("participants", 'author')->whereHas("participants", function ($q) {
                $q->where('participant_id', auth()->user()->id);
            })->orWhere('creator', auth()->user()->id)->get(),

        ]);
    }

    public function create()
    {
        return view("profile.privateMessages.create", [
            "username" => User::where('slugified_user', request()->slugified_user)->first()->username
        ]);
    }

    public function store(Request $request)
    {
        // When a PM is created, notify all participants
        // excluding the creator of the PM.
        $pm = $request->validate([
            "title" => "required|min:3|max:255|unique:threads,title",
            "body" => "required|min:3",

        ]);

        $pm['creator'] = auth()->user()->id;
        $partis = explode(',', $request['participants']);

        $createSlugArr = explode(' ', $pm['title']);
        $slug = implode('-', $createSlugArr);

        $pm['slug'] = str_replace(array("?","!",",",";"), "", $slug);
        $newPM = Private_Message::create($pm);
        Message_Participant::create(["pm_id" => $newPM->id, "participant_id" => $newPM->creator]);

        if (count(array_filter($partis)) > 1) {
            ddd($partis);
            foreach ($partis as $participant) {
                $parti = User::where("username", $participant)->first();
                $partici['participant_id'] = $parti->id;
                $partici['pm_id'] = $newPM->id;
                Message_Participant::create($partici);
            }
        } else {
            $parti = User::where("username", $partis[0])->first();
            $partici['participant_id'] = $parti->id;
            $partici['pm_id'] = $newPM->id;
            Message_Participant::create($partici);
        }

        // notify all but creator
        $newPM->participants->filter(function ($participant) use ($newPM) {
            return $participant->participant_id !== $newPM->creator;
        })->each->newPM($newPM);
    }
}
