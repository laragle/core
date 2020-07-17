<?php

namespace Laragle\Core\Tests\Authentication;

use Laragle\Authentication\Models\User;
use Laragle\Core\Tests\TestCase;

class LogoutTest extends TestCase
{
    /** @test */
    public function it_can_logout()
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
                        ->postJson(route('laragle.auth.logout'));

        $response->assertSuccessful();

        $this->assertGuest();
    }
}
