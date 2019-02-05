<?php

namespace App\Http\Controllers;
use App\Post;
use App\comment;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index()
    {


        return Post::all();
    }

    public function show($id){


        return Post::find($id);
    }

    public function comment(Request $request)
    {
        return Comment::create($request->all());
    }
}
