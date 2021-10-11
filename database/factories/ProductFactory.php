<?php

use App\Shop;
use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        //
        'name' => $faker->realText(30),
        'price' => $faker->numberBetween(100,999),
        'category_id' => $faker->numberBetween(1,7),
        'exp_date' => $faker->dateTime,
        'comment' => $faker->realText,
        'pic1' => 'pro1.jpg',
        'sold_flg' => $faker->numberBetween(0,1),
        'shop_id' => $faker->numberBetween(1,2),
        'created_at' => $faker->datetime($max = 'now', $timezone = date_default_timezone_get()),
        'updated_at' => $faker->datetime($max = 'now', $timezone = date_default_timezone_get())

    ];
});
