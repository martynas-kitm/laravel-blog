<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' =>['create', 'store']]);
        $this->middleware('auth', ['except' =>['index', 'showPost']]);
    }
    public function renderForm(){
        return view('pages.create-post');
    }

    public function store(){
        $this->validate(request(),[
            'title' => 'required',
            'body' => 'required'
        ]);
        Post::create([
            'title' => request('title'),
            'body' => request('body'),
            'user_id' => Auth::id()
        ]);

        return redirect('/');
    }

    public function postEdit(Post $post)
    {
        if(Gate::denies('edit-post', $post))
        {
            return view('pages.restrict');
        }
        return view('pages.edit-post', compact('post'));
    }

    public function postUpdateStore(Request $request, Post $post)
    {
        Post::where('id', $post->id)->update($request->only(['title', 'body']));

        return redirect('/');
    }

    public function deletePost(Post $post)
    {
        $post->delete();

        return redirect('/');
    }


}
