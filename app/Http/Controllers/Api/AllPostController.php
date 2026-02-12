<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Services\SocialNetwork\PostService;

class AllPostController extends Controller
{
    public function index(PostService $service)
    {
        $data = $service->getWithRelations(['user', 'images', 'comments', 'likes']);
        return jsonSuccess(PostResource::collection($data));
    }

}
