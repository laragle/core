<?php

namespace Laragle\Core\Tests\Auth;

use Laragle\Auth\AuthServiceProvider;
use Laragle\Auth\Passwords\PasswordResetServiceProvider;
use Laragle\Core\Tests\TestCase as BaseTestCase;
use Laravel\Sanctum\SanctumServiceProvider;

class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app)
    {
        return [
            AuthServiceProvider::class,
            PasswordResetServiceProvider::class,
            SanctumServiceProvider::class,
        ];
    }
}