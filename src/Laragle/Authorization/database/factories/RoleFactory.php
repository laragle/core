<?php

use Faker\Generator as Faker;
use Laragle\Authorization\Models\Role;

$factory->define(Role::class, function (Faker $faker) {
    return [
        'title' => $faker->words(3, true),
    ];
});
