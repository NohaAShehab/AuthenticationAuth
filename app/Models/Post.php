<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable=["title","body","user_id"];

    // define relation between the post table and users table
    // relation type
    // Author --> has many posts
    // one post --> has only one Author , user
    // inside the model --> define busniess

//    $post->user_id
//select name  from users where user_id = (
//        select user_id from posts where id= :id);
    // define relation between post , user

    // 1 post ---> is written by one user

    // define relation
//    function user(){
//        // $post --> user_id //// users --> id
//        // user model --> user_id ---> id
//        // return User object --> the author of the post .
//        return $this->belongsTo(User::class);
//    }

    function path(){
        return route("posts.show",$this);
    }






    function user(){ // acts like property
        return $this->belongsTo(User::class);
    }
}
