<?php

namespace Laragle\Core\Tests\Authorization;

use Laragle\Authorization\Models\Role;
use Laragle\Core\Tests\TestCase;

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

    /** @test */
    public function it_can_store_a_role()
    {
        $this->withoutExceptionHandling();

        $this->loginAsSuperAdmin();

        $data = [
            'title' => $this->faker->words(3, true),
        ];

        $response = $this->postJson(route('laragle.roles.store'), $data);

        $response->assertSuccessful();

        $this->assertDatabaseHas('roles', $data);
    }

    /** @test */
    public function it_can_return_a_role()
    {
        $this->withoutExceptionHandling();

        $this->loginAsSuperAdmin();

        $role = factory(Role::class)->create();

        $response = $this->getJson(route('laragle.roles.show', ['role' => $role->id]));

        $response->assertSuccessful();

        $response->assertJsonFragment($role->toArray());
    }

    /** @test */
    public function it_can_update_a_role()
    {
        $this->withoutExceptionHandling();

        $this->loginAsSuperAdmin();

        $role = factory(Role::class)->create();

        $data = [
            'title' => $this->faker->words(3, true)
        ];

        $response = $this->patchJson(route('laragle.roles.update', ['role' => $role->id]), $data);

        $this->assertEquals($data['title'], $role->fresh()->title);
    }

    /** @test */
    public function it_can_delete_a_role()
    {
        $this->loginAsSuperAdmin();

        $role = factory(Role::class)->create();

        $response = $this->deleteJson(route('laragle.roles.destroy', ['role' => $role->id]));

        $response->assertSuccessful();

        $this->assertDeleted('roles', $role->toArray());
    }
}