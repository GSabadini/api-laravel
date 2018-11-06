<?php

namespace App\Domains\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Class AuthController
 * @package App\Domains\Auth
 */
class AuthController extends Controller
{
    public function authenticate(Request $request)
    {
        dd($request->email);
    }
}
