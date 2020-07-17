<?php

namespace Laragle\Core\Tests\Authentication;

use Laragle\Authentication\Models\User;
use Laragle\Core\Tests\TestCase;

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
