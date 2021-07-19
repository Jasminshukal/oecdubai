<?php

namespace Database\Seeders;

use App\Models\events;
use Illuminate\Database\Seeder;




class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            EventsSeeder::class,
        ]);
        // \App\Models\events::factory(10)->create();
        // \App\Models\User::factory(10)->create();
    }
}
