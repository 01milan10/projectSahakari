<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Inbox;
use Faker\Generator as Faker;

$factory->define(Inbox::class, function (Faker $faker) {
    return [
        'sender_name' => $faker->name,
        'sender_email' => $faker->email,
        'message_subject' => $faker->title,
        'message' => $faker->realText(200),
        'badge' => 'new',
    ];
});
