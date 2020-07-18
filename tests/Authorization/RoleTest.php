<?php

namespace Laragle\Core\Tests\Authorization;

use Laragle\Core\Tests\TestCase;
use Silber\Bouncer\Database\Role;

class RoleTest extends TestCase
{
    /** @test */
    public function it_can_return_a_list_of_roles()
    {
        $this->withoutExceptionHandling();

        $this->loginAsSuperAdmin();

        $role = factory(Role::class)->create();

        $response = $this->getJson(route('laragle.roles.index'));

        $response->assertSuccessful();

        $response->assertJsonFragment($role->toArray());
    }
}