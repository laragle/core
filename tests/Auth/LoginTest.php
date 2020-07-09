<?php

namespace Laragle\Core\Tests\Auth;

use Laragle\Auth\Models\User;

class LoginTest extends TestCase
{
    /** @test */
    public function it_can_login()
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();

        $response = $this->postJson(route('laragle.auth.login'), [
            'email' => $user->email,
            'password' => 'password'
        ]);

        $response->assertSuccessful();

        $this->assertAuthenticated();
    }
}