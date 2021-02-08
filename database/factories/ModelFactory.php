<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Wallet;
use App\Category;
use App\Information;
use App\Store;
use App\Product;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(User::class, function (Faker $faker) {
    return [
        'firstname' => $faker->firstName,
        'lastname' => $faker->lastName,
        'mobilenumber' => $faker->phoneNumber,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password,
    ];
});

$factory->define(Wallet::class, function (Faker $faker) {
    return [];
});

$factory->define(Information::class, function (Faker $faker) {
    return [];
});

$factory->define(Category::class, function (Faker $faker) {
    $cat = $faker->word;
    return [
        'name' => $cat,
        'slug' => Str::slug($cat),
    ];
});

$factory->define(Store::class, function (Faker $faker) {
    return [
        'name' => $faker->words(3, true),
        'user_id' => App\User::all()->random()->id,
        'description' => $faker->paragraph,
        'mobilenumber' => $faker->phoneNumber,
        'city' => $faker->city,
        'state' => $faker->state,
        'address' => $faker->address,
        'avatar' => $faker->imageUrl(),
        'coverimage' => $faker->imageUrl(),
    ];
});

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->words(5, true),
        'slug' => function (array $product) {
            return Str::slug($product['name']);
        },
        'details' => $faker->sentence,
        'price' => $faker->randomFloat(2, 5499.99, 249999.99),
        'store_id' => App\Store::all()->random()->id,
        'description' => $faker->paragraph,
        'category_id' => App\Category::all()->random()->id,
        'image' => $faker->imageUrl(),
    ];
});