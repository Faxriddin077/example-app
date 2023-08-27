<?php

namespace App\Exceptions;

use Exception;

class NoAccessToOperationException extends Exception
{
    protected $message = 'NoAccessToOperation';
}
