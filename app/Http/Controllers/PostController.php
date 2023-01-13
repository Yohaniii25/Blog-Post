<?php

namespace App\Http\Controllers;
// Undefined type 'App\Http\Controllers\Post'
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'thumbnail' => 'required|image'
        ]);

         //When someone remove the required part from the inpect, using this it can be handled not to create a post in db
        if ($validator->fails()) {
            return Back()->with('status', 'Something Wrong');
        } else {
            $imageName = time() . "." . $request->thumbnail->extension();
            $request->thumbnail->move(public_path('thumbnails'), $imageName);
            Post::create([
                'user_id' => auth()->user()->id,
                'title' => $request->title,
                'description' => $request->description,
                'thumbnail' => $imageName
            ]);
        }


        //after we create a post return back to the previous page
        return redirect(route('posts.allPosts'))->with('status', 'Post has created successfully');
    }

    public function show($postId)
    {

        //If post is available it show if it is not land on not found
        $post = Post::findOrFail($postId);

        return view('posts.show', compact('post'));
    }

    public function edit($postId)
    {
        $post = Post::findOrFail($postId);
        return view('posts.edit', compact('post'));
    }

    public function update($postId, Request $request)
    {

        Post::findOrFail($postId)->update($request->all());

        return redirect(route('posts.allPosts'))->with('status', 'Post has updated successfully');
    }

    public function delete($postId)
    {
        Post::findOrFail($postId)->delete();

        return redirect(route('posts.allPosts'));
    }
}
