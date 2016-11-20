<?php

use App\ValueObjects\HintType;
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
            'content' => 'Your Secret Santa is female',
            'type' => HintType::gender(),
            'created_at' => $faker->dateTime,
            'updated_at' => $faker->dateTime,
        ]);

        DB::table('hints')->insert([
            'receiver_id' => '5811f279fc1bc7db15d9af5f',
            'content' => 'Your Secret Santa joined in March',
            'type' => HintType::joinedInMonth(),
            'created_at' => $faker->dateTime,
            'updated_at' => $faker->dateTime,
        ]);

        DB::table('hints')->insert([
            'receiver_id' => '002',
            'content' => 'Your Secret Santa joined in 2015',
            'type' => HintType::joinedInYear(),
            'created_at' => $faker->dateTime,
            'updated_at' => $faker->dateTime,
        ]);

        DB::table('hints')->insert([
            'receiver_id' => '002',
            'content' => 'Your Secret Santa\s birthday is on May 31, 1989',
            'type' => HintType::birthday(),
            'created_at' => $faker->dateTime,
            'updated_at' => $faker->dateTime,
        ]);

        DB::table('hints')->insert([
            'receiver_id' => '002',
            'content' => 'Your Secret Santa\'s last name starts with G',
            'type' => HintType::lastNameStartsWith(),
            'created_at' => $faker->dateTime,
            'updated_at' => $faker->dateTime,
        ]);
    }
}
