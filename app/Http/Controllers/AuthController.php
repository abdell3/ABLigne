<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $user = User::create($request->validated());

        $token = JWTAuth::fromUser($user);

        return response()->json([
            'user' => $user,
            'token' => $token,
        ], 201);
    }

    public function login(Request $request)
    {
        $ess = $request->only('email', 'password');

        if(!$token = JWTAuth::attempt($ess))
        {
            return response()->json(['error' => 'non autoriser'], 401);
        }

        return response()->json([
            'token' => $token,
        ]);
    }


    public function logout()
    {
        Auth::logout();
        return response()->json(['message' => 'ByBy']);

    }


    public function refresh()
    {
        return response()->json([
            'token' => Auth::refresh(),
        ]);
    }


    public function profile()
    {
        return response()->json(Auth::user());
    }


}
