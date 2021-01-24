<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(20)->create();
        \App\Models\Message::factory(20)->create();
        // \App\Models\Subject::factory(25)->create();
        // \App\Models\Fee::factory(15)->create();
        // \App\Models\Grade::factory(20)->create();
        // \App\Models\Injury::factory(5)->create();
        // \App\Models\Payment::factory(6)->create();
        // \App\Models\Report::factory(13)->create();
        // \App\Models\TimeTable::factory(8)->create();
    }
}
