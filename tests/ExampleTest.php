<?php

namespace Laragle\Core\Tests;

use Orchestra\Testbench\TestCase;
use Laragle\Core\CoreServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [CoreServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
