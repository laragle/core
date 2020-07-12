<?php

namespace Laragle\Core\Tests\Auth;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Laragle\Auth\Facades\Password;
use Laragle\Auth\Models\User;
use Laragle\Auth\Notifications\ResetPasswordNotification;

class ResetPasswordTest extends TestCase
{
    /** @test */
    public function it_can_email_reset_password_link()
    {
        $this->withoutExceptionHandling();

        Notification::fake();

        $user = factory(User::class)->create();

        $response = $this->postJson(route('laragle.auth.password.email'), [
            'email' => $user->email
        ]);

        $response->assertSuccessful();

        Notification::assertSentTo($user, ResetPasswordNotification::class);
    }

    /** @test */
    public function it_can_reset_password()
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();

        $token = Password::broker()->createToken($user);

        $newPassword = $this->faker->password;

        $response = $this->postJson(route('laragle.auth.password.reset'), [
            'email' => $user->email,
            'token' => $token,
            'password' => $newPassword,
            'password_confirmation' => $newPassword,
        ]);

        $response->assertSuccessful();

        $this->assertTrue(Hash::check($newPassword, $user->fresh()->password));
    }
}