<?php

namespace App\Repositories\SocialNetwork;

use App\Models\SocialNetwork\Comment;
use App\Models\SocialNetwork\Post;
use App\Repositories\MainRepository;

class CommentRepository extends MainRepository
{
    public function __construct(Comment $model)
    {
        $this->model = $model;
        $this->columsFile = [];
        $this->fileFolder = '';
    }



}
