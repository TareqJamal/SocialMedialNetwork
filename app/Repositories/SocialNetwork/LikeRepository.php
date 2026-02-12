<?php

namespace App\Repositories\SocialNetwork;

use App\Models\SocialNetwork\Comment;
use App\Models\SocialNetwork\Like;
use App\Repositories\MainRepository;

class LikeRepository extends MainRepository
{
    public function __construct(Like $model)
    {
        $this->model = $model;
        $this->columsFile = [];
        $this->fileFolder = '';
    }



}
