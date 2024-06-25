<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function store(LoginRequest $request): array {
        return [
            'token' => $request->user->createToken('SPA')->plainTextToken,
        ];
    }
}
