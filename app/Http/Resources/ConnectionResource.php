<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ConnectionResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => (integer)$this->id,
            'name' => (string)$this->user->name,
            'profile_picture' => show_file($this->user->profile_picture),
        ];
    }
}
