<?php

namespace App\Repositories\SocialNetwork;

use App\Models\SocialNetwork\Post;
use App\Repositories\MainRepository;

class PostRepository extends MainRepository
{
    public function __construct(Post $model)
    {
        $this->model = $model;
        $this->columsFile = [];
        $this->fileFolder = '';
    }



}
