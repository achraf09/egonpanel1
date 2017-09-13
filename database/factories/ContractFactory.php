<?php

$factory->define(App\Contract::class, function (Faker\Generator $faker) {
    return [
        "contractsname" => $faker->name,
        "end_date" => $faker->date("d-m-Y", $max = 'now'),
        "owner_id" => factory('App\User')->create(),
    ];
});
