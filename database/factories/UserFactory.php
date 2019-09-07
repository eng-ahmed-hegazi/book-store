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

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Book::class, function (Faker $faker) {
    return [
        'name'          => $faker->sentence(5),
        'slug'          => str_slug($faker->sentence(5)),
        'download_link' => $faker->url(),
        'description'   => $faker->paragraph(5),
        'author'        => $faker->sentence(3),
        'size'          => rand(2,7),
        'download_count' => 0,
        'category_id'   => rand(1,10),
        'image'         => 'uploads/products/book.png',

    ];
});

$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'name'=> $faker->sentence(1),
    ];
});

$factory->define(App\Subcategory::class, function (Faker $faker) {
    return [
        'name'=> $faker->sentence(1),
        'cat_id'=> rand(1,10),
    ];
});

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'comment'=> $faker->paragraph(5),
        'likes'=> 0,
        'book_id'=> rand(1,30),
        'user_id'=> rand(1,3),
    ];
});
