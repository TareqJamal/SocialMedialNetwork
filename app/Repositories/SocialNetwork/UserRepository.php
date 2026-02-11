<?php

namespace App\Repositories\SocialNetwork;

use App\Models\Abandeh\Feature;
use App\Models\User;
use App\Repositories\MainRepository;

class UserRepository extends MainRepository
{
    public function __construct(User $model)
    {
        $this->model = $model;
        $this->columsFile = [''];
        $this->fileFolder = '';
    }

}
