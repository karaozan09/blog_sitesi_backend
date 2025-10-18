<?php

namespace App\Http\Controllers;

use App\DTOs\LoginDTO;
use App\Http\Requests\AuthRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct(protected AuthService $authService){}

    public function login(AuthRequest $request)
    {
        $dto = new LoginDTO(
            email:$request->email,
            password:$request->password,
            remember: $request->remember
        );
        $result = $this->authService->login($dto);

        if ($result) {
            return response()->json($result);
        }

        return response()->json(['error' => 'Bilgiler uyuşmuyor.'], 401);
    }

    public function logout(Request $request)
    {
        $user = $request->user();

        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $this->authService->logout($user);

        return response()->json(['message' => 'Çıkış yapıldı.']);
    }
}
