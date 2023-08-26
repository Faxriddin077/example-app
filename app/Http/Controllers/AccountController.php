<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\LoginRequest;

class AccountController extends Controller
{
    public function create(CreateUserRequest $request)
    {
        $request->createUser();

        return response()->json([
            'success' => true
        ]);
    }

    public function login(LoginRequest $request)
    {
        return [
            'success' => true,
            'token' => $request->login()
        ];
    }
}
