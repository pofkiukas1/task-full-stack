<?php

use Faker\Generator as Faker;

$factory->define(App\Users::class, function (Faker $faker) {
    return [
        'name' =>$faker->text(10),
        'lname' =>$faker->text(15),
        'email' =>$faker->text(15),
        'address' =>$faker->text(30),

    ];
});
