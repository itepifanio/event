<?php

namespace App\Exceptions;

use Exception;
use Throwable;

class EventDoesntBelongOrganization extends Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct('Event doesn\'t belong organization', $code, $previous);
    }
}
