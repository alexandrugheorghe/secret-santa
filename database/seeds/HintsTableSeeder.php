<?php

use Faker\Factory;
use Illuminate\Database\Seeder;

class HintsTableSeeder extends Seeder
{
    /**
     * This seeder is for dev purposes ONLY. Do not seed this in production.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        DB::table('hints')->insert([
            'receiver_id' => '5811f279fc1bc7db15d9af5f',
            'content' => $faker->realText($maxNbChars = 120, $indexSize = 2),
            'created_at' => $faker->dateTime,
            'updated_at' => $faker->dateTime,
        ]);

        DB::table('hints')->insert([
            'receiver_id' => '5811f279fc1bc7db15d9af5f',
            'content' => $faker->realText($maxNbChars = 120, $indexSize = 2),
            'created_at' => $faker->dateTime,
            'updated_at' => $faker->dateTime,
        ]);

        DB::table('hints')->insert([
            'receiver_id' => '002',
            'content' => $faker->realText($maxNbChars = 120, $indexSize = 2),
            'created_at' => $faker->dateTime,
            'updated_at' => $faker->dateTime,
        ]);

        DB::table('hints')->insert([
            'receiver_id' => '002',
            'content' => $faker->realText($maxNbChars = 120, $indexSize = 2),
            'created_at' => $faker->dateTime,
            'updated_at' => $faker->dateTime,
        ]);

        DB::table('hints')->insert([
            'receiver_id' => '002',
            'content' => $faker->realText($maxNbChars = 120, $indexSize = 2),
            'created_at' => $faker->dateTime,
            'updated_at' => $faker->dateTime,
        ]);
    }
}
