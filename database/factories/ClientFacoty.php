<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Balance;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Balance::class, function (Faker $faker) {
    return [
        'client_name'=>$faker->name,
        'client_email'=>$faker->email,
        'deposited_amount'=>$faker->randomDigitNotNull*100,
        'collected_by'=>$faker->name,
        'collected_date'=>$faker->unique()->dateTimeThisMonth(),
    ];
});
