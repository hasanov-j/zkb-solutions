<?php

namespace App\Exceptions\AuthExceptions;

use Symfony\Component\HttpFoundation\Response;

class EmailAlreadyExistsException extends \Exception
{
    protected $message = 'This email is already registered. Please click Log In to sign into your account.';

    protected $code = Response::HTTP_CONFLICT;

    public function render()
    {
        return response()->json([
            'message' => $this->message,
        ], $this->code);
    }
}
