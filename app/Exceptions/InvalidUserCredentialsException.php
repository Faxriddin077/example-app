<?php

namespace App\Exceptions;

use Exception;

class InvalidUserCredentialsException extends Exception
{
    protected $message = 'InvalidUserCredentials';
}
