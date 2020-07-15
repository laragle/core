<?php

namespace Laragle\Core\Tests\Authentication;

use Laragle\Authentication\AuthenticationServiceProvider;
use Laragle\Authentication\Passwords\PasswordResetServiceProvider;
use Laragle\Core\Tests\TestCase as BaseTestCase;
use Laravel\Sanctum\SanctumServiceProvider;

class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app)
    {
        return [
            AuthenticationServiceProvider::class,
            PasswordResetServiceProvider::class,
            SanctumServiceProvider::class,
        ];
    }
}
