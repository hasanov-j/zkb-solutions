<?php

namespace App\Http\Controllers;

use App\Exceptions\AuthExceptions\PasswordIncorrectException;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\SignUpRequest;
use App\Models\User;
use App\Repository\User\UserRepository;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\PersonalAccessToken;


class AuthController extends Controller
{
    public function __construct(
        protected UserRepository $userRepository,
    ) {
    }

    public function signUp(SignUpRequest $request)
    {
        /** @var User $user */
        $user = $this->userRepository->findByEmail($request->getEmail());

        if (!$user) {
            User::create([
                'username' => $request->getUsername(),
                'email' => $request->getEmail(),
                'password' => $request->getPassword(),
            ]);
        }

        return response()->json(['message' =>  'You are successfully registered, please, login']);
    }

    public function login(LoginRequest $request)
    {
        $email = $request->getEmail();

        /** @var User $user */
        $user = $this->userRepository->getByEmail($email);

        if (!Hash::check($request->getPassword(), $user->getPassword()))
        {
            throw new PasswordIncorrectException();
        }

        PersonalAccessToken::where('name', $email)->delete();
        $token = $user->createToken($user->getEmail());
        $token->accessToken->save();

        return ['access_token' => $token->plainTextToken, 'type' => 'Bearer'];
    }
}
