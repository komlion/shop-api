<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignupRequest;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(LoginRequest $request)
    {
        return [
            'data' => [
                'user_token' => Auth::user()->generateToken()
            ]
        ];
    }

    public function logout(Request $request)
    {
        Auth()->user()->clearToken();

        return response()->json([
            'data' => [
                'message' => 'logout',
            ],
        ])->setStatusCode(200);
    }

    public function signup(SignupRequest $request)
    {
        $user = User::create($request->all());

        return [
            'data' => [
                'user_token' => $user->generateToken()
            ]
        ];
    }
}
