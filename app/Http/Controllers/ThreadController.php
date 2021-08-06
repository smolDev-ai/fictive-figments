<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Forum;
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
        return view("threads.threadforum", [
            "forum" => Forum::find(request()->id)
        ]);
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

        $forumCheck = Forum::where('id', $request->id)->with('category')->first();

        $thread['author'] = $request->user()->id;
        $thread['type'] = $request->type;

        $createSlugArr = explode(' ', $thread['title']);
        $slug = implode('-', $createSlugArr);

        $thread['slug'] =str_replace(array("?","!",",",";"), "", $slug);

        $id ? $thread['forum'] = (int) $id : $thread['forum'] = $request['forum'];
        $thread['created_on'] = new DateTime();

        if ($forumCheck->category->is_rp) {
            $newThread = Thread::create($thread);
            $newThread->subscribe();
            if ($newThread->type === 'ooc') {
                $newThread->title = 'ooc_' . $thread['title'];
                $newThread->save();
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

                Thread::create($characters)->subscribe();
                Thread::create($InCharacter)->subscribe();
            } elseif ($newThread->type === 'ic') {
                $newThread->title = 'ic_' . $thread['title'];
                $newThread->save();
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

                Thread::create($characters)->subscribe();
                Thread::create($outOfCharacter)->subscribe();
            }
        } else {
            $newThread = Thread::create($thread);
            $newThread->subscribe();
        }




        $request->user()->incrementPostCount();





        return redirect("/forum/{$request->id}/thread/$newThread->slug/$newThread->type");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($forum_id, $thread_slug, $thread_type = null)
    {
        $thread = Thread::where('slug', $thread_slug)->where('type', $thread_type)->first();
        return view('threads.show', [
            'thread' => $thread,
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
    public function destroy($forum, $thread_slug)
    {
        $threads = Thread::where("slug", $thread_slug)->get();
        $nonRP = null;
        $thread_author = $threads[0]->author;
        foreach ($threads as $thread) {
            $this->authorize('delete', $thread);
            if ($thread->type) {
                if ($thread->post_count() > 0) {
                    foreach ($thread->posts as $post) {
                        $post_author = $post->author;
                        $post->delete();
                        User::find($post_author)->decrementPostCount();
                    }
                }
                $thread->delete();
            } else {
                $nonRP = $nonRP ? $thread : null;
                break;
            }
        }

        if (isset($nonRP)) {
            if ($nonRP->post_count() > 0) {
                foreach ($thread->posts as $post) {
                    $post_author = $post->author;
                    $post->delete();
                    User::find($post_author)->decrementPostCount();
                }
                User::find($nonRP->author)->decrementPostCount();
                $nonRP->delete();
            }
        }

        User::find($thread_author)->decrementPostCount();
        session()->flash('success', "Thread deleted!");
        return redirect("/forum/" . request()->id);
    }
}
