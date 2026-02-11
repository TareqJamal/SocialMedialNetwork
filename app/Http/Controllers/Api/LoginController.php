<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SocialNetwork\LoginRequest;
use App\Services\SocialNetwork\UserService;

class LoginController extends Controller
{
    public function store(LoginRequest $request, UserService $service)
    {
        $data = $request->validated();
        dd($data);

    }

}
