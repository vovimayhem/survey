<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Result::class, function (Faker $faker) {
	return [
		'case_number' => $faker->numberBetween(10000, 60000),
		'question1'   => $faker->numberBetween(1,5),
		'question2'   => $faker->numberBetween(1,5),
		'question3'   => $faker->numberBetween(1,5),
		'question4'   => $faker->numberBetween(1,5),
		'question5'   => $faker->randomElement($array = array ('True','False')),
		'language'    => $faker->randomElement($array = array ('en','es')),
		'feedback'    => $faker->text($maxNbChars = 200),  
		'status'      => $faker->randomElement($array = array ('Created','Completed', 'Incomplete')),
		'url'         => $faker->url
	];
});
