<?php

use Faker\Generator as Faker;

$factory->define(App\Models\DriverSurvey::class, function (Faker $faker) {

    $sexuality = mt_rand(0,1) ? 'female' : 'male';
    	
    return [
         'name'      => $faker->name($sexuality),
         'region'    => $faker->country,
         'age'       => mt_rand(10,65),
         'sexuality' => $sexuality,
         'email'     => $faker->email,
         'game'      => $faker->word,
	 'suggest'   => $faker->sentence,
	 'type'      => 'G' . mt_rand(1,20),
	 'facebook'  => $faker->word,
         'created_at' => strtotime($faker->dateTimeBetween('2019-01-01', 'now')->format('Y-m-d H:i'))
    ];
});
