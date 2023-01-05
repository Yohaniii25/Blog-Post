<?php

namespace App\Http\Controllers;

// Undefined type 'App\Http\Controllers\Post'.
use App\Models\Post;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('Welcome', compact('posts'));
    }
}
