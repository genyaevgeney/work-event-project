<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Article;
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


$factory->define(Article::class, function () {
	$rand = rand(0, 999999);
    return [
        'title' => "testTitle$rand",
        'subtitle' => "testSubtitle$rand",
        'content' => "testContent$rand",
    ];
});
