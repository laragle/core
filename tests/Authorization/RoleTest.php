<?php

namespace Laragle\Core\Tests\Authorization;

use Laragle\Core\Tests\TestCase;

class RoleTest extends TestCase
{
    /** @test */
    public function it_can_return_a_list_of_roles()
    {
        $this->withoutExceptionHandling();

        $this->login();

        $response = $this->getJson(route('laragle.roles.index'));

        $response->assertSuccessful();
    }
}