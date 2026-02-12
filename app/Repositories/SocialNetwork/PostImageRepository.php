<?php

namespace App\Repositories\SocialNetwork;

use App\Models\SocialNetwork\Connection;
use App\Models\SocialNetwork\PostImage;
use App\Repositories\MainRepository;

class PostImageRepository extends MainRepository
{
    public function __construct(PostImage $model)
    {
        $this->model = $model;
        $this->columsFile = ['image'];
        $this->fileFolder = 'post_images';
    }




}
