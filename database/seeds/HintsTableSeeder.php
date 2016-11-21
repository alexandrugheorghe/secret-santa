<?php

use App\ValueObjects\HintType;
use Carbon\Carbon;
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
            'revealed_at' => Carbon::now(),
        ]);

        DB::table('hints')->insert([
            'receiver_id' => '5811f279fc1bc7db15d9af5f',
            'content' => 'Your Secret Santa joined in March',
            'type' => HintType::joinedInMonth(),
            'revealed_at' => Carbon::now()->addDay(),
        ]);

        DB::table('hints')->insert([
            'receiver_id' => '002',
            'content' => 'Your Secret Santa joined in 2015',
            'type' => HintType::joinedInYear(),
            'revealed_at' => Carbon::now()->subHour(),
        ]);

        DB::table('hints')->insert([
            'receiver_id' => '002',
            'content' => 'Your Secret Santa\s birthday is on May 31, 1989',
            'type' => HintType::birthday(),
            'revealed_at' => Carbon::now()->subWeek(),
        ]);

        DB::table('hints')->insert([
            'receiver_id' => '002',
            'content' => 'Your Secret Santa\'s last name starts with G',
            'type' => HintType::lastNameStartsWith(),
            'revealed_at' => Carbon::now()->addWeek(),
        ]);
    }
}
