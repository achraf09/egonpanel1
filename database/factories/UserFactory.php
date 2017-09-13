<?php

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        "name" => $faker->name,
        "lastname" => $faker->name,
        "email" => $faker->safeEmail,
        "password" => str_random(10),
        "birthdate" => $faker->date("d-m-Y", $max = 'now'),
        "address" => $faker->name,
        "role_id" => factory('App\Role')->create(),
        "remember_token" => $faker->name,
        "group_id" => factory('App\Group')->create(),
    ];
});
