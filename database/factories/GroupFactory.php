<?php

$factory->define(App\Group::class, function (Faker\Generator $faker) {
    return [
        "grp_name" => $faker->name,
        "admin_id" => factory('App\User')->create(),
    ];
});
