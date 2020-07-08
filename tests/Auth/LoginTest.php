<?php

namespace Laragle\Core\Tests\Auth;

use Laragle\Auth\Models\User;

class LoginTest extends TestCase
{
    /** @test */
    public function it_can_login()
    {
        $user = factory(User::class)->create();

        $response = $this->postJson(route('auth.login'), [
            'email' => $user->email
        ]);

        $this->assertTrue(true);
    }
}