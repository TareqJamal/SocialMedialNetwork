<?php

namespace App\Repositories\SocialNetwork;

use App\Enums\ConnectionsStatusEnum;
use App\Models\SocialNetwork\Connection;
use App\Repositories\MainRepository;
use App\Services\SocialNetwork\ConnectionService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class ConnectionRepository extends MainRepository
{
    public function __construct(Connection $model)
    {
        $this->model = $model;
        $this->columsFile = [];
        $this->fileFolder = '';
    }

    public function getConnectionBetween($userId, $connectedId)
    {
        return $this->model->where(function ($query) use ($userId, $connectedId) {
            $query->where('user_id', $userId)->where('connected_id', $connectedId);
        })->orWhere(function ($query) use ($userId, $connectedId) {
            $query->where('user_id', $connectedId)->where('connected_id', $userId);
        })->first();
    }
}
