<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SocialNetwork\UserRequest;
use App\Http\Resources\UserResource;
use App\Services\SocialNetwork\UserService;

class UserController extends Controller
{

    public function store(UserRequest $request, UserService $service)
    {
        $data = $request->validated();
        $user = $service->storeWithFiles($data);
        return jsonSuccess(UserResource::make($user));
    }

    public function show($id, UserService $service)
    {
        $user = $service->find($id);
        if (!$user) {
            return jsonApiValid(null, __('api.data_not_found'));
        }
        return jsonSuccess(UserREsource::make($user));
    }

}
