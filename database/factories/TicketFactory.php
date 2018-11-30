<?php

use Faker\Generator as Faker;

$factory->define(App\Ticket::class, function (Faker $faker) {
    return [
        'title' => $faker->text(255),
        'body' => implode("\r", $faker->sentences(3)),
        'customer_id' => App\User::customer()->inRandomOrder()->first()->id,
        'ticket_status_id' => 1
    ];
});
