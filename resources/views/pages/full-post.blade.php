@extends('layouts/main')

@section('content')
        <h2>{{$post->title}}</h2>
        <p>{{$post->body}}</p>
         <div class="comments">
                 <h4>Komentarai</h4>
                 <ul class="list-group">
                         @foreach($post->comments as $comment)
                                 <li class="list-group-item"><strong>{{$comment->created_at}}</strong> {{$comment->body}}</li>
                                 @endforeach
                 </ul>
         </div>

        <hr>

        <div class="card">
            <div class="card-block">
                <form action="/post/{{$post->id}}/comment" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <textarea name="body" placeholder="Jūsų komentaras..." class="form-control" ></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Komentuok žmogau</button>
                    </div>
                </form>
            </div>
        </div>


        @if(Auth::id() == $post->user_id)
        <a href="/post/{{$post->id}}/edit">Redaguoti</a>
        <a href="/post/{{$post->id}}/delete">Šalinti</a>
        @endif

@endsection
