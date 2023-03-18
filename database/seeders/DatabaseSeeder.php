<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
       /*
        User::factory()->create([
            'name' => 'Stefan',
            'email' => 'info@info.de',
            'password' => bcrypt('test1234')
        ]);
       */

        Team::factory(1)->create();
        $this->call(EventSeeder::class);
        $this->call(OperationalLocationSeeder::class);
        $this->call(timetabelHelperListSeeder::class);
        $this->call(OperationalBookingSeeder::class);
        $this->call(InstructionSeeder::class);
        //User::factory(1)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
