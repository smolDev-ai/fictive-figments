<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Thread;
use App\Models\User;
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

    public function forumThread()
    {
        return view("threads.threadforum");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id = null)
    {
        $thread = $request->validate([
            "title" => "required|min:3|max:255|unique:threads,title",
            "body" => "required|min:3",

        ]);

        $thread['author'] = $request->user()->id;
        $thread['type'] = $request->type;

        $createSlugArr = explode(' ', $thread['title']);
        $slug = implode('-', $createSlugArr);

        $thread['slug'] = $slug;

        $id ? $thread['forum'] = (int) $id : $thread['forum'] = $request['forum'];
        $thread['created_on'] = new DateTime();

        $newThread = Thread::create($thread);
        $request->user()->incrementPostCount();


        if ($newThread->type === 'ooc') {
            $InCharacter = [
                "title" => 'ic_' . $thread['title'],
                "body" => '',
                "author" => $thread['author'],
                "slug" => $slug,
                "type" => 'ic',
                "forum" => $id ? $thread['forum'] = (int) $id : $thread['forum'] = $request['forum'],
                "created_on" => new DateTime()
            ];
            $characters = [
                "title" => 'char_' . $thread['title'],
                "body" => '',
                "author" => $thread['author'],
                "slug" => $slug,
                "type" => 'char',
                "forum" => $id ? $thread['forum'] = (int) $id : $thread['forum'] = $request['forum'],
                "created_on" => new DateTime()
            ];

            Thread::create($characters);
            Thread::create($InCharacter);
        } elseif ($newThread->type === 'ic') {
            $outOfCharacter = [
                "title" => 'ooc_' . $thread['title'],
                "body" => '',
                "author" => $thread['author'],
                "slug" => $slug,
                "type" => 'ooc',
                "forum" => $id ? $thread['forum'] = (int) $id : $thread['forum'] = $request['forum'],
                "created_on" => new DateTime()
            ];
            $characters = [
                "title" => 'char_' . $thread['title'],
                "body" => '',
                "author" => $thread['author'],
                "slug" => $slug,
                "type" => 'char',
                "forum" => $id ? $thread['forum'] = (int) $id : $thread['forum'] = $request['forum'],
                "created_on" => new DateTime()
            ];

            Thread::create($characters);
            Thread::create($outOfCharacter);
        }


        return redirect("/forum/{$thread['forum']}/thread/$newThread->slug/$newThread->type");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($forum_id, $thread_slug, $thread_type)
    {
        $thread = Thread::where('slug', $thread_slug)->where('type', $thread_type)->first();
        return view('threads.show', [
            'thread' => $thread,
            "trimmedTitle" => $thread->trimTitle(),
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
