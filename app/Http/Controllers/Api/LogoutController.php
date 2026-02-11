<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SocialNetwork\LoginRequest;
use App\Http\Resources\UserResource;
use App\Services\SocialNetwork\UserService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class LogoutController extends Controller
{
    public function index()
    {
        Auth::user()->currentAccessToken()->delete();
        return jsonSuccess();
    }

}
