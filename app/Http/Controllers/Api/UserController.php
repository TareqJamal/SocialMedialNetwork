<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SocialNetwork\UserRequest;
use App\Services\SocialNetwork\UserService;

class UserController extends Controller
{
    public function store(UserRequest $request, UserService $service)
    {
        $data = $request->validated();
        $user = $service->storeWithFiles($data);
        return jsonSuccess($user);
    }

}
