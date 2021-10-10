<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(RegisterUserRequest $request): JsonResponse
    {
        $fields = $request->validated();

        $user = User::firstOrCreate([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password'])
        ]);

        $token = $user->createToken(time())->plainTextToken;

        $response = [
            'user' => new \App\Http\Resources\User($user),
            'token' => $token
        ];

        return response()->json($response, 201);
    }

    public function login(LoginRequest $request): JsonResponse
    {
        $fields = $request->validated();

        // Check email
        $user = User::where('email', $fields['email'])->first();

        // Check password
        if (is_null($user) || !Hash::check($fields['password'], $user->getAuthPassword())) {
            return response()->json([
                'message' => 'email or password is incorrect'
            ], 401);
        }

        $this->clearExistingTokens();

        $token = $user->createToken(time())->plainTextToken;

        return response()->json(['token' => $token], 201);
    }

    public function logout(): JsonResponse
    {
        $this->clearExistingTokens();

        return response()->json(['message' => 'logged out']);
    }

    public function clearExistingTokens(): void
    {
        if (auth()->user()) {
            auth()->user()->tokens()->delete();
        }
    }
}
