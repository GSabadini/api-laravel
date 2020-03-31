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
    /**
     * @var AuthService
     */
    private $service;

    public function __construct(AuthService $service)
    {
        $this->service = $service;
    }

    /**
     * @param AuthRequest $request
     * @return \Illuminate\Http\JsonResponse
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
