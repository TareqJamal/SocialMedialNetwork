<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => (int) $this->id,
            'author_name' => (string) $this->user->name,
            'content' => (string) $this->content,
            'date' => (string) $this->created_at?->diffForHumans(),
        ];
    }
}
