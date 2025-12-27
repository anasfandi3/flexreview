<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $validated = $request->validated();
        $username = $validated['username'];
        $password = $validated['password'];
        if ($username === 'admin' && $password === 'admin') {
            return response()->json([
                'message' => 'login successful',
                'data' => ['username' => 'admin', 'password' => 'admin']
            ]);
        } else {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }
    }
}
