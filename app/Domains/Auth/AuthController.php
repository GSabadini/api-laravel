<?php

namespace App\Domains\Auth;

use App\Domains\User\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

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
        $user = User::where('email', $request->email)->first();

        $credentials = $request->only('email', 'password');
        dd(JWTAuth::attempt($credentials));

        if (!Hash::check($request->password, $user->password) && md5($request->password) != $user->password) {
            return response()->json(['error' => 'invalid_credentials'], 401);
        }

        return response()->json(compact('token', 'user'));
    }
}
