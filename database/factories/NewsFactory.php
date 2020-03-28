<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\News::class, function (Faker $faker) {
    $title = $faker->sentence(rand(3, 8), true);
    $txt = $faker->realText(rand(1000, 4000));
    $isPublished = rand(1, 5) > 1;

    $data = [
      'category_id' => rand (1, 5),
      'user_id' => rand(1, 2) ? 1:2,
      'slug' => Str::slug($title),
      'title' => $title,
      'content_raw' => $txt,
      'content_html' => $txt,
      'is_published' => $isPublished,
      'published_at'=> $isPublished ? $faker->dateTimeBetween('-2 month', '-1 day') : null,
      'created_at' => $faker->dateTimeBetween('-2 month', '-1 day'),
      'updated_at' => $faker->dateTimeBetween('-2 month', '-1 day')

    ];
    return $data;
});
