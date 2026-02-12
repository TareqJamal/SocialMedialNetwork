<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ConnectionResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => (integer)$this->id,
            'name' => (string)$this->connected->name,
            'profile_picture' => show_file($this->connected->profile_picture),
        ];
    }
}
