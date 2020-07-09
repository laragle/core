<?php

namespace Laragle\Core\Tests\Auth;

use Illuminate\Support\Facades\Notification;
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
}