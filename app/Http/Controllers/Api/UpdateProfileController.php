<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SocialNetwork\UpdateProfileRequest;
use App\Http\Resources\UserResource;
use App\Services\SocialNetwork\UserService;
use Illuminate\Support\Facades\Auth;

class UpdateProfileController extends Controller
{
    public function store(UpdateProfileRequest $request, UserService $service)
    {
        $data = $request->validated();
        $service->updateWithFiles(Auth::id(), $data);
        $user = $service->find(Auth::id());
        return jsonSuccess(UserResource::make($user));
    }
}
