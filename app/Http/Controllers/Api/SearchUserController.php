<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SocialNetwork\SearchUserRequest;
use App\Http\Requests\SocialNetwork\UserRequest;
use App\Http\Resources\UserResource;
use App\Services\SocialNetwork\UserService;

class SearchUserController extends Controller
{

    public function store(SearchUserRequest $request, UserService $service)
    {
        $data = $request->validated();
        $users = $service->searchUser($data);
        return jsonSuccess(UserResource::collection($users));
    }
}
