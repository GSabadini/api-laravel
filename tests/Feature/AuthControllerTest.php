<?php

namespace Tests\Feature;

use App\Domains\User\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{
    use DatabaseMigrations;

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

        dd($response->decodeResponseJson());
        $response
            ->assertStatus(200);
    }
}
