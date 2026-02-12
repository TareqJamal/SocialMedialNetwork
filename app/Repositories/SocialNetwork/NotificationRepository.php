<?php

namespace App\Repositories\SocialNetwork;

use App\Models\SocialNetwork\Notification;
use App\Repositories\MainRepository;

class NotificationRepository extends MainRepository
{
    public function __construct(Notification $model)
    {
        $this->model = $model;
        $this->columsFile = [];
        $this->fileFolder = '';
    }

}
