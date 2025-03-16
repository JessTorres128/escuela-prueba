<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Group;
use Faker\Generator as Faker;

$factory->define(Group::class, function (Faker $faker) {
    return [
        'semester' => $faker->numberBetween(1,6),
        'group' => strtoupper($faker->randomLetter),
        'session' => $faker->randomElement(["Morning", "Afternoon", "Night"])
    ];
});
