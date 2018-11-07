<?php

namespace App\Domains\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Response;

/**
 * Class AuthController
 * @package App\Domains\Auth
 */
class AuthController extends Controller
{
    private $service;

    public function __construct()
    {
        $this->service = new AuthService();
    }

    /**
     * @param AuthRequest $request
     * @return ResponseFactory|Response
     */
    public function authenticate(AuthRequest $request)
    {
        try {
            $email = $request->email;
            $password = $request->password;

            return $this
                ->service
                ->authenticate($email, $password);
        } catch (ModelNotFoundException $exception) {
            return response()->json(['error' => 'invalid_credentials'], 401);
        }
    }
}
