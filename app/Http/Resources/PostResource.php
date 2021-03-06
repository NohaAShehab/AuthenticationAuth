<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
//        return parent::toArray($request);
        return [
            "id"=>$this->id,
            "posttitle"=>$this->title,
            "postbody"=>$this->body,
//            "author"=>[
//                "name"=>$this->user->name,
//                "email"=>$this->user->email,]
                "author"=> new UserResource($this->user)

            ];
    }
}
