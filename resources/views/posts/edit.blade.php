@extends('layouts.app')


@section('content')


    <h1> Edit post {{$post->id}} </h1>
    <form action="{{route("posts.update",$post)}}" method="POST">
        @csrf
        @method("put")
{{--        @method("put")--}}

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text"
                   value="{{$post->title}}"
                   class="form-control"
                   name="title" id="post_title" aria-describedby="titleHelp">
{{--            <label class="text-danger"> {{$errors->first("title")}}</label>--}}
        </div>
        <div class="form-group">
            <label for="body">Body</label>
            <textarea  class="form-control"
                       name="body" id="body" aria-describedby="bodyHelp">{{$post->body}}</textarea>
{{--            <label class="text-danger"> {{$errors->first("body")}}</label>--}}
        </div>

        <button type="submit"  class="btn btn-success">Submit</button>
        <a class="btn btn-primary" href="{{route("posts.index")}}">Back</a>

    </form>

@endsection
