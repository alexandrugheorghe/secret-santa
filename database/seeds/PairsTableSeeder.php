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
            'giver_id' => '001',
            'receiver_id' => '002',
            'created_at' => $faker->dateTime,
            'updated_at' => $faker->dateTime,
        ]);

        DB::table('pairs')->insert([
            'giver_id' => '002',
            'receiver_id' => '002',
            'created_at' => $faker->dateTime,
            'updated_at' => $faker->dateTime,
        ]);

        DB::table('pairs')->insert([
            'giver_id' => '003',
            'receiver_id' => '004',
            'created_at' => $faker->dateTime,
            'updated_at' => $faker->dateTime,
        ]);

        DB::table('pairs')->insert([
            'giver_id' => '004',
            'receiver_id' => '001',
            'created_at' => $faker->dateTime,
            'updated_at' => $faker->dateTime,
        ]);
    }
}
