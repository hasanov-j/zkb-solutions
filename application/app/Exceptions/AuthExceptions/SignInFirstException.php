<?php

namespace App\Exceptions\AuthExceptions;

use Symfony\Component\HttpFoundation\Response;

class SignInFirstException extends \Exception
{
    protected $message = 'Please first register in the application';

    protected $code = Response::HTTP_CONFLICT;

    public function render()
    {
        return response()->json([
            'message' => $this->message,
        ], $this->code);
    }
}
