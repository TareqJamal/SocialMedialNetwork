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




}
