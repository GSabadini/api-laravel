<?php

namespace App\Domains\Auth;

use App\Domains\User\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Hash;
use JWTAuth;

/**
 * Class AuthService
 * @package App\Domains\Auth
 */
class AuthService
{
    public function authenticate($email, $password)
    {
        $user = $this->getUser($email);

        if (!Hash::check($password, $user->password) && md5($password) != $user->password) {
            throw new ModelNotFoundException();
        }

        $token = JWTAuth::fromUser($user);

        return response()->json(compact('token', 'user'));
    }

    public function getUser($email)
    {
        return User
            ::where('email', $email)
            ->firstOrFail();
    }
}
