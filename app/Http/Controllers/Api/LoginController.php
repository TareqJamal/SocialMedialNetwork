<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SocialNetwork\LoginRequest;
use App\Http\Resources\UserResource;
use App\Services\SocialNetwork\UserService;

class LoginController extends Controller
{
    public function store(LoginRequest $request, UserService $service)
    {
        $data = $request->validated();
        $result = $service->login($data);
        if (isset($result['error'])) {
            return jsonApiValid(null,$result['error']);
        }
        return jsonSuccess(UserResource::make($result));
    }

}
