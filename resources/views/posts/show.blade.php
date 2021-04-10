@extends('layouts.app')


@section('content')
{{--@dd($post->user->name)--}}
    <h1>  Post details </h1>

        <table class="table table-bordered">
        <tr>
            <th > ID</th>
            <td> {{$post->id}} </td>
        </tr>
        <tr>
            <th >Title</th>
            <td> {{$post->title}} </td>
        </tr>

        <tr>
            <th >Body</th>
            <td>  {{$post->body}}</td>
        </tr>

        <tr>
            <th >User ID</th>
            <td>  {{$post->user ? $post->user->name : "Default Author"}}</td>
            //
        </tr>

        <tr>
            <th > Created at</th>
            <td> {{$post["created_at"]}}  </td>
        </tr>
        <tr>
            <th>Updated at </th>
            <td> {{$post["updated_at"]}} </td>
        </tr>
    </table>
    <a class="btn btn-info" href="{{route("posts.index")}}">Back</a>



@endsection
