@extends('layouts/main')
@section('content')
    <div class="row">
    @foreach($posts as $post)
<div class="col-md-4">
    <h2>{{$post->title}}</h2>

    <p>{{str_limit($post->body, 200)}}</p>
    <p><a class="btn btn-default" href="post/{{$post->id}}" role="button">Daugiau &raquo;</a></p>
</div>
    @endforeach
    </div>
    <div class="pager">
  {{$posts->links()}}
    </div>
@endsection