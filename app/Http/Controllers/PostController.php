<?php

namespace App\Http\Controllers;
// Undefined type 'App\Http\Controllers\Post'
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(Request $request)
    {
        Post::create([
            'user_id' => auth()->user()->id,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        //after we create a post return back to the previous page
        return back();
    }

    public function show() {
        return view('posts.show');
    }
}
