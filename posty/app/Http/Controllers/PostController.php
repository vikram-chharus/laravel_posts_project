<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    
    public function __construct(){
        $this->middleware(['auth'])->only('store', 'destroy', 'edit');
    }
    
    
    public function index()
    {
        if(!auth()->user()->IsAdmin)
        {
            return back();
        }
            $posts = Post::latest()->with(['user', 'likes'])->paginate(4);
            return view('posts.index', [
            'posts'=>$posts]);
        
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }


    public function store(Request $request)
    {
        if(!auth()->user()->IsAdmin)
        {
            return back();
        }
        $this->validate($request, [
            'body' => 'required'
        ]);

        $request->user()->posts()->create($request->only('body'));
        
        return back();
    }

    public function edit(Post $post)
    {
        return view('posts.edit', ['post'=>$post]);
    }

    public function update(Request $request, Post $post)
    {
        $post->body = $request->body;
        $post->save();
        return redirect()->route('dashboard');
    }

    public function destroy(Post $post){
        if(!auth()->user()->IsAdmin)
        {
            return back();
        }
        $this->authorize('delete', $post);
        $post->delete();
        return redirect()->route('home');
    }

}
