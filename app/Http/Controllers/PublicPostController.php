<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class PublicPostController extends Controller
{
    public function index(){
        $posts = POST::paginate(3);

        return view('pages.home', compact('posts'));
    }

    public function showPost(Post $post){

        return view('pages.full-post', compact('post'));
    }
}
