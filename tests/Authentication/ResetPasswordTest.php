<?php

namespace Laragle\Core\Tests\Authentication;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Laragle\Authentication\Facades\Password;
use Laragle\Authentication\Models\User;
use Laragle\Authentication\Notifications\ResetPasswordNotification;
use Laragle\Core\Tests\TestCase;

class ResetPasswordTest extends TestCase
{
    /** @test */
    public function it_can_email_reset_password_token()
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
        //$this->withoutExceptionHandling();

        $user = factory(User::class)->create();

        $token = Password::broker()->createToken($user);

        $newPassword = 'newpassword';

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
