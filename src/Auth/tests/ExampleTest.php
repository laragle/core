<?php

namespace Laragle\Auth\Tests;

use Orchestra\Testbench\TestCase;
use Laragle\Auth\AuthServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [AuthServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
