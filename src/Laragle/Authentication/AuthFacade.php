<?php

namespace Laragle\Authentication;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Laragle\Authentication\Skeleton\SkeletonClass
 */
class AuthFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'auth';
    }
}
