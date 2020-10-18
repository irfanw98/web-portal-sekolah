<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Siswa;

$factory->define(Siswa::class, function (Faker $faker) {
    return [
        'user_id' => 100,
        'nama_depan' => $faker->name,
        'nama_belakang' => '',
        'tgllahir' => $faker->date,
        'jenis_kelamin' => $faker->randomElement(['L', 'P']),
        'alamat' => $faker->address
    ];
});
