<?php

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PairsTableSeeder extends Seeder
{
    /**
     * This seeder is for dev purposes ONLY. Do not seed this in production.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        DB::table('pairs')->insert([
            'giver_id' => '5811f279fc1bc7db15d9af5f',
            'receiver_id' => '002',
            'created_at' => $faker->dateTime,
            'updated_at' => $faker->dateTime,
        ]);

        DB::table('pairs')->insert([
            'giver_id' => '002',
            'receiver_id' => '5811f279fc1bc7db15d9af5f',
            'created_at' => $faker->dateTime,
            'updated_at' => $faker->dateTime,
        ]);
    }
}
