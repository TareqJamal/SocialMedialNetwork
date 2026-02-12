<?php

namespace App\Repositories\SocialNetwork;

use App\Models\User;
use App\Repositories\MainRepository;

class UserRepository extends MainRepository
{
    public function __construct(User $model)
    {
        $this->model = $model;
        $this->columsFile = ['profile_picture'];
        $this->fileFolder = 'user_images';
    }

    public function searchUser($data)
    {
        return $this->model->when($data['name'], function ($query) use ($data) {
            return $query->where('name', 'LIKE', '%' . $data['name'] . '%');
        })->get();
    }

}
