<?php

namespace Laragle\Core\Tests\Auth;

class RegistrationTest extends TestCase
{
    /** @test */
    public function it_can_logout()
    {
        $this->withoutExceptionHandling();        

        $response = $this->postJson(route('laragle.auth.register'), [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => $this->faker->safeEmail,
            'password' => 'password',
            'password_confirmation' => 'password'
        ]);

        $response->assertSuccessful();

        $this->assertAuthenticated();
    }
}