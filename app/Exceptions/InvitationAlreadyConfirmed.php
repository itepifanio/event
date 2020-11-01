<?php

namespace App\Exceptions;

use Exception;
use Throwable;

class InvitationAlreadyConfirmed extends Exception
{
    public function __construct($message="", $code=0, Throwable $previous = null)
    {
        parent::__construct('Invitation was already confirmed.', $code, $previous);
    }
}