<?php

namespace App\Facades;

use App\Models\User;
use App\Services\AccountService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Facade;

/**
 * @method static JsonResponse create(array $data)
 * @method static JsonResponse login(string $email, string $password)
 * @method static JsonResponse show()
 *
 * @see AccountService
 */
class Accounts extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'accountService';
    }
}
