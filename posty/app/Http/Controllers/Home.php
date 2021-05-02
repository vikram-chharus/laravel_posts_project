<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class Home extends Controller
{
    public function show()
    {
        $posts = Post::latest()->with(['user', 'likes'])->paginate(4);

        return view('home')->with([
            'posts' => $posts
        ]);
    }
}
