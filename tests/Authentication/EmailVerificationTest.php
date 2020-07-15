<?php

namespace Laragle\Core\Tests\Authentication;

use Laragle\Authentication\Models\OneTimePassword;
use Laragle\Authentication\Models\User;
use Laravel\Sanctum\Sanctum;

class EmailVerificationTest extends TestCase
{
    /** @test */
    public function it_can_send_email_verification_token()
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();

        Sanctum::actingAs($user);

        $response = $this->postJson(route('laragle.auth.verify.email.resend'));

        $response->assertSuccessful();
    }

    /** @test */
    public function it_can_verify_email()
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();

        $otp = $user->otps()->create([
            'action' => OneTimePassword::VERIFY_EMAIL
        ]);

        Sanctum::actingAs($user);

        $response = $this->postJson(route('laragle.auth.verify.email'), [
            'token' => $otp->token
        ]);

        $response->assertSuccessful();
    }
}
