<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Exceptions\Account\InvalidUserCredentialsException;

class AccountService
{
    public function create($data): User
    {
        return User::query()->create([
            'name' => Arr::get($data, 'name'),
            'email' => Arr::get($data, 'email'),
            'password' => Hash::make(Arr::get($data, 'password'))
        ]);
    }

    /**
     * @throws InvalidUserCredentialsException
     */
    public function login(string $email, string $password): string
    {
        $user = User::query()
            ->where('email', $email)
            ->first();

        if (!empty($user)) {
            if (Auth::attempt(['email' => $email, 'password' => $password])) {
                return $user->createToken('api-token')->plainTextToken;
            }
        }

        throw new InvalidUserCredentialsException();
    }
}