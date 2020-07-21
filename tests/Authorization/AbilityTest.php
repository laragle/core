<?php

namespace Laragle\Core\Tests\Authorization;

use Laragle\Authorization\Models\Ability;
use Laragle\Core\Tests\TestCase;

class AbilityTest extends TestCase
{
    /** @test */
    public function it_can_return_a_list_of_abilities()
    {
        $this->withoutExceptionHandling();

        $this->loginAsSuperAdmin();

        $ability = factory(Ability::class)->create();

        $response = $this->getJson(route('laragle.abilities.index'));

        $response->assertSuccessful();

        $response->assertJsonFragment($ability->toArray());
    }

    /** @test */
    public function it_can_store_an_ability()
    {
        $this->withoutExceptionHandling();

        $this->loginAsSuperAdmin();

        $data = [
            'title' => $this->faker->words(3, true),
        ];

        $response = $this->postJson(route('laragle.abilities.store'), $data);

        $response->assertSuccessful();

        $this->assertDatabaseHas('abilities', $data);
    }

    /** @test */
    public function it_can_return_an_ability()
    {
        $this->withoutExceptionHandling();

        $this->loginAsSuperAdmin();

        $ability = factory(Ability::class)->create();

        $response = $this->getJson(route('laragle.abilities.show', ['ability' => $ability->id]));

        $response->assertSuccessful();

        $response->assertJsonFragment($ability->toArray());
    }

    /** @test */
    public function it_can_update_an_ability()
    {
        $this->withoutExceptionHandling();

        $this->loginAsSuperAdmin();

        $ability = factory(Ability::class)->create();

        $data = [
            'title' => $this->faker->words(3, true)
        ];

        $response = $this->patchJson(route('laragle.abilities.update', ['ability' => $ability->id]), $data);

        $this->assertEquals($data['title'], $ability->fresh()->title);
    }

    /** @test */
    public function it_can_delete_an_ability()
    {
        $this->loginAsSuperAdmin();

        $ability = factory(Ability::class)->create();

        $response = $this->deleteJson(route('laragle.abilities.destroy', ['ability' => $ability->id]));

        $response->assertSuccessful();

        $this->assertDeleted('abilities', $ability->toArray());
    }
}