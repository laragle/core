<?php

namespace Laragle\Core\Tests\Auth;

use Laragle\Auth\AuthServiceProvider;
use Laragle\Core\Tests\TestCase as BaseTestCase;
use Laravel\Sanctum\SanctumServiceProvider;

class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app)
    {
        return [
            AuthServiceProvider::class,
            SanctumServiceProvider::class,
        ];
    }
}