<?php

namespace App\Domains\Auth;

use App\Domains\User\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use JWTAuth;

/**
 * Class AuthController
 * @package App\Domains\Auth
 */
class AuthController extends Controller
{
    /**
     * @param AuthRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function authenticate(AuthRequest $request)
    {
        $email = $request->email;
        $password = $request->password;

        $user = User::where('email', $email)->first();


        if (!Hash::check($password, $user->password) && md5($password) != $user->password) {
            return response()->json(['error' => 'invalid_credentials'], 401);
        }

        $token = JWTAuth::fromUser($user);

        return response()->json(compact('token', 'user'));
    }
}
