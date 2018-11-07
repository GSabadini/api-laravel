<?php

namespace Tests\Feature;

use App\Domains\User\User;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{
    private $endpoint = 'api/auth';

    public function testShouldLoginWithUser()
    {
        /** @var User $user */
        $user = factory(User::class)->create();

        $payload = [
            'email' => $user->email,
            'password' => 'secret',
        ];

        $response = $this->post($this->endpoint, $payload);

        $response
            ->assertStatus(200);
    }
}
