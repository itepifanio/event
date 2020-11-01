<?php

namespace App\Exceptions;

use Exception;
use Throwable;

class UserNotSubscribed extends Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct('A user that\'s not subscribed was inserted on the form', $code, $previous);
    }
}
