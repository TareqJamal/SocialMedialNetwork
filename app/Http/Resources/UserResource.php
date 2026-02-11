<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => (integer)$this->id,
            'name' => (string)$this->name,
            'email' => (string)$this->email,
            'bio' => (string)$this->bio,
            'profile_picture' => show_file($this->profile_picture),
            'token' => $this->token,
        ];
    }
}
