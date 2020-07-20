<?php

use Faker\Generator as Faker;
use Laragle\Authorization\Models\Role;

$factory->define(Role::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'title' => $faker->word,
    ];
});
