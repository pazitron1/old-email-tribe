<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Job;
use Faker\Generator as Faker;

$factory->define(Job::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(4),
        'description' => $faker->text,
        'type' => $faker->word,
        'location' => $faker->word,
        'link_to_apply' => $faker->word,
        'category_id' => factory(\App\Category::class),
        'tag_id' => factory(\App\Tag::class),
        'salary' => $faker->word,
    ];
});
