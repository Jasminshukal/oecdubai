<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Str;

class EventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i=0; $i < 10; $i++) {
            $int= mt_rand(1262055681,1262055681);
            DB::table('events')->insert([
                'name' => Str::random(10),
                'description' => Str::random(10),
                'image' => Str::random(10).".jpg",
                'date' => date("Y-m-d",$int),
            ]);
        }

    }
}
