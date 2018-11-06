<?php

namespace App\Domains\Auth;

use App\Http\Controllers\Controller;

/**
 * Class AuthController
 */
class AuthController extends Controller
{
    public function authenticate(AuthRequest $request)
    {
        dd($request);
    }
}
