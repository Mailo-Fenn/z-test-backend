<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\LoginUserRequest;
use App\Models\User;

class AuthController extends Controller
{
    public function getToken(StoreUserRequest $request)
    {
        $user = User::create($request->all());
        return response()->json([
            'user' => $user,
            'token' => $user->createToken("Токен пользователя {$user->name}")->plainTextToken,
        ]);
    }
}
