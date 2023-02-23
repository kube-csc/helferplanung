<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class timetabelHelperListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('timetabel_helper_lists')->delete();

        \DB::table('timetabel_helper_lists')->insert(
            array(
                array('id' => '1','event_id' => '7','operational_location_id' => '5','startZeit' => '2023-02-23 08:04:00','endZeit' => '2023-02-23 09:00:00','anzahlHelfer' => '1','deleted_at' => NULL,'created_at' => '2023-02-22 20:05:39','updated_at' => '2023-02-22 20:47:14'),
                array('id' => '2','event_id' => '7','operational_location_id' => '5','startZeit' => '2023-02-23 00:00:00','endZeit' => '2023-02-23 06:00:00','anzahlHelfer' => '1','deleted_at' => NULL,'created_at' => '2023-02-22 23:35:46','updated_at' => '2023-02-22 23:35:46'),
                array('id' => '3','event_id' => '7','operational_location_id' => '4','startZeit' => '2023-02-23 00:00:00','endZeit' => '2023-02-23 00:00:00','anzahlHelfer' => '1','deleted_at' => NULL,'created_at' => '2023-02-22 23:45:40','updated_at' => '2023-02-22 23:45:40')
                )
        );
    }
}
