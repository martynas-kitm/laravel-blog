@extends('layouts/main')

@section('content')
    @include('includes/errors')
    <form action="/post/{{$post->id}}" method="POST"  class="form-horizontal">
        {{ csrf_field() }}
        {{method_field('PATCH')}}
        <div class="form-group">
            <label for="title" class="col-sm-2 control-label">Pavadinimas</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="title" name="title" value="{{$post->title}}">
            </div>
        </div>
        <div class="form-group">
            <label for="body" class="col-sm-2 control-label">Įrašo turinys</label>
            <div class="col-sm-10">
                 <textarea class="form-control" rows="5" id="body" name="body">
                     {{$post->body}}
                 </textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Paskelbti</button>
            </div>
        </div>
    </form>

@endsection