<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostValidationRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    public function __construct(){
        $this->middleware("auth")->except(["index","show"]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $posts=Post::all();

        return view("posts.index",compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $users=User::all();
        return view("posts.create",compact("users"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostValidationRequest $request)
    {
        //
//        dd($request);
//        $request->validate([
//            "title"=>"required|min:5",
//            "body"=>"max:15"
//        ],[
//            "title.required"=>"Please provide descriptive title"
//        ]);
//        $request->validate([
//            'title' => 'required|unique:posts|max:255',
//            'body' => 'required',
//        ]);
        Post::create($request->all());
        return redirect(route("posts.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
        // $post->title="aaa";
//        $post->save();
//        dd($post->user); // Object --> User --> all user info


//        dd($post->user()->get());  // relation object -> get() --> get data

//        dd($post->user);
        // call relation function --> object with type Belongs to relation
//        select * form user where user_id -->users.id
        return view("posts.show",compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
        return view("posts.edit",compact("post"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostValidationRequest $request, Post $post)
    {
        //
//        $request->validate([
//            "title"=>"required|min:5",
//            "body"=>"max:15"
//        ],[
//            "title.required"=>"Please provide descriptive title"
//        ]);
        $user=Auth::user();

        if ($user->can('update', $post)) {
            //user is authorized now
            $post->update($request->all());
//        return redirect(route("posts.index"));
            // RETURN SHOW POST AFTER UPDATE
            return redirect($post->path());
        }else{
            return "not authorized";
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
        if (Gate::allows('isAdmin')) {

            dump('Admin allowed');
            $post->delete();
            return redirect(route("posts.index"));

        } else {

            dump('You are not Admin');


        }

    }
}
