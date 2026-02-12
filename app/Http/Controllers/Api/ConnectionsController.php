<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;

class ConnectionsController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $data = $user->friends;
        return jsonSuccess(UserResource::collection($data));
    }

}
