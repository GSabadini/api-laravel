<?php

namespace Tests\Feature;

use App\Domains\User\User;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{
    private $endpoint = 'api/auth';

    public function testShouldLoginWithCredentialsValid()
    {
        /** @var User $user */
        $user = factory(User::class)->create();

        $payload = [
            'email' => $user->email,
            'password' => 'secret',
        ];

        $response = $this->post($this->endpoint, $payload);
        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'token',
                'user',
            ]);
    }

    public function testShouldFailedWithCredentialsInvalid()
    {
        /** @var User $user */
        $user = factory(User::class)->create();

        $payload = [
            'email' => $user->email,
            'password' => 'invalid',
        ];

        $response = $this->post($this->endpoint, $payload);

        $response
            ->assertStatus(401)
            ->assertJson([
                'error' => 'invalid_credentials',
            ]);
    }
}
