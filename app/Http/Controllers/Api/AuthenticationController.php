<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthenticationController extends Controller
{
    public function login(Request $request): JsonResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            // $request->session()->regenerate();
            $user = User::whereEmail($credentials["email"])->first();
            $token = $user->createToken("access_token");
            return response()->json(['status' => 'ok', "access_token" => $token]);
        }
 
        return response()->json([
            "status" => "error",
            'message' => 'invalid credentials.',
        ], 401);
    }
    //
}
