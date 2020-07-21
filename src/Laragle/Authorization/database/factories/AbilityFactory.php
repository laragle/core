<?php

use Faker\Generator as Faker;
use Laragle\Authorization\Models\Ability;

$factory->define(Ability::class, function (Faker $faker) {
    return [
        'title' => $faker->words(3, true),
    ];
});
