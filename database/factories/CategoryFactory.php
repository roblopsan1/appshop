<?php

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
      'name'=>ucfirst($faker->word),
      'description'=> $faker ->sentence(10)

    ];
});
