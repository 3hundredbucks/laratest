<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Models\BlogPost;

$factory->define(BlogPost::class, function (Faker $faker) {
    $title = $faker->sentence(rand(3, 8), true);
    $txt = $faker->realText(rand(1000, 4000));
    $isPublished = rand(1, 5) > 1;

    $cratedAt = $faker->dateTimeBetween('-3 months', '-2 months');

    $data = [
        'category_id' => rand(1, 11),
        'user_id' => rand(1, 5) == 5 ? 1 : 2,
        'title' => $title,
        'slug' => Str::slug($title),
        'excerpt' => $faker->text(rand(40, 100)),
        'content_raw' => $txt,
        'content_html' => $txt,
        'is_published' => $isPublished,
        'published_at' => $isPublished ? $faker->dateTimeBetween('-2 months', '-1 months') : null,
        'created_at' => $cratedAt,
        'updated_at' => $cratedAt
    ];

    return $data;
});

