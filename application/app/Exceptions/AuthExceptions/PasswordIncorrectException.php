<?php

namespace App\Exceptions\AuthExceptions;

use Symfony\Component\HttpFoundation\Response;

class PasswordIncorrectException extends \Exception
{
    protected $message = 'Fail login, please, check your password';

    protected $code = Response::HTTP_CONFLICT;

    public function render()
    {
        return response()->json([
            'message' => $this->message,
        ], $this->code);
    }
}
