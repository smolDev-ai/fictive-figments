<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Thread;
use DateTime;
use Illuminate\Http\Request;

use function PHPSTORM_META\map;

class ThreadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("threads.create", ["categories" => Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $thread = $request->validate([
            "title" => "required|min:3|max:255|unique:threads,title",
            "body" => "required|min:3",

        ]);

        $thread['author'] = $request->user()->id;
        $thread['forum'] = $request['forum'];
        $thread['created_on'] = new DateTime();

        $newThread = Thread::create($thread);

        return redirect("/forum/{$request['forum']}/thread/{$newThread->id}");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($forum_id, $thread_id)
    {
        return view('threads.show', [
            'thread' => Thread::find($thread_id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
