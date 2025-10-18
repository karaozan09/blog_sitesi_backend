<?php

namespace App\Services;

use App\DTOs\LoginDTO;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function login(LoginDTO $dto): ?array
    {
        if (Auth::attempt(['email' => $dto->email, 'password' => $dto->password],$dto->remember ?? false)) {
            $user = Auth::user();
            $token = $user->createToken('Project App Token')->plainTextToken;

            return [
                'token' => $token,
                'user' => new UserResource($user->load([]))
            ];
        }

        return null;
    }

    public function logout($user): void
    {
        $user->currentAccessToken()->delete();
    }
}
