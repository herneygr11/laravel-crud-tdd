<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Role;
use Faker\Generator as Faker;

$factory->define(Role::class, function (Faker $faker) {
    return [
        "name"          => $faker->sentence(1),
        "description"   => $faker->text(100),
        "guard_name"    => $faker->randomElement(["web", "api"])
    ];
});
