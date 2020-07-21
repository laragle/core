<?php

namespace Laragle\Authorization\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Laragle\Support\Scopes\SearchScope;
use Laragle\Support\Scopes\SortScope;
use Silber\Bouncer\Database\Ability as Model;

class Ability extends Model
{
    use SearchScope, SortScope, Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     * 
     * @return array
     */
    public function sluggable()
    {
        return [
            'name' => [
                'source' => 'title'
            ]
        ];
    }
}