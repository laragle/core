<?php

namespace Laragle\Core\Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laragle\Authentication\AuthenticationServiceProvider;
use Laragle\Authentication\Models\User;
use Laragle\Authentication\Passwords\PasswordResetServiceProvider;
use Laragle\Authorization\AuthorizationServiceProvider;
use Laravel\Sanctum\Sanctum;
use Laravel\Sanctum\SanctumServiceProvider;
use Orchestra\Testbench\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    use RefreshDatabase, WithFaker;

    protected function getPackageProviders($app)
    {
        return [
            AuthenticationServiceProvider::class,
            PasswordResetServiceProvider::class,
            SanctumServiceProvider::class,
            AuthorizationServiceProvider::class,
        ];
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        // Setup default database to use sqlite :memory:
        $app['config']->set('database.default', 'testbench');
        $app['config']->set('database.connections.testbench', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);
    }

    protected function login()
    {
        $user = factory(User::class)->create();

        Sanctum::actingAs($user);

        return $user;
    }
}