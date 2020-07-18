<?php

namespace Laragle\Authorization\Models;

use Laragle\Support\Scopes\SearchScope;
use Laragle\Support\Scopes\SortScope;
use Silber\Bouncer\Database\Role as Model;

class Role extends Model
{
    use SearchScope, SortScope;
}