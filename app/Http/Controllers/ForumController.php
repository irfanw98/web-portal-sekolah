<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Forum;

class ForumController extends Controller
{
    public function index()
    {
        $forum = Forum::paginate(10);
        return view('forum.index', compact('forum'));
    }

    public function create(Request $request)
    {
        // $user = auth()->user('id');
        $request->$request->add(['user_id' => auth()->user()->id]);
        dd($request->all());
        // $forum = Forum::created($request->all());
    }
}
