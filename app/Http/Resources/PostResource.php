<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => (int)$this->id,
            'author_name' => (string)@$this->user->name,
            'profile_picture' => show_file(@$this->user->profile_picture),
            'content' => (string)$this->content,
            'comments' => CommentResource::collection($this->comments),
            'number_of_comments' => $this->comments()->count(),
            'number_of_likes' => $this->likes()->count(),
            'images' => PostImageResource::collection($this->images),
            'date' => (string)$this->created_at?->diffForHumans(),
        ];
    }
}
