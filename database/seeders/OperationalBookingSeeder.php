<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OperationalBookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('operational_bookings')->delete();

        \DB::table('operational_bookings')->insert(
            array(
                array('id' => '1','event_id' => '7','operational_location_id' => '3','timetabel_helper_lists_id' => '1','user_id' => NULL,'Vorname' => 'Vorname','Nachname' => 'Nachname','email' => 'info@info.de','datum' => '2050-06-11','startZeit' => '10:00:00','endZeit' => '12:00:00','deleted_at' => NULL,'created_at' => '2023-03-18 12:48:31','updated_at' => '2023-03-18 12:48:31'),
                array('id' => '2','event_id' => '7','operational_location_id' => '3','timetabel_helper_lists_id' => '2','user_id' => NULL,'Vorname' => 'Vorname','Nachname' => 'Nachname','email' => 'info@info.de','datum' => '2050-06-11','startZeit' => '12:00:00','endZeit' => '14:00:00','deleted_at' => NULL,'created_at' => '2023-03-18 13:55:05','updated_at' => '2023-03-18 13:55:05'),
                array('id' => '3','event_id' => '7','operational_location_id' => '3','timetabel_helper_lists_id' => '2','user_id' => NULL,'Vorname' => 'Vorname','Nachname' => 'Nachname','email' => 'info1@info.de','datum' => '2050-06-11','startZeit' => '12:00:00','endZeit' => '14:00:00','deleted_at' => NULL,'created_at' => '2023-03-18 13:55:05','updated_at' => '2023-03-18 13:55:05'),
                array('id' => '4','event_id' => '7','operational_location_id' => '3','timetabel_helper_lists_id' => '2','user_id' => NULL,'Vorname' => 'Vorname','Nachname' => 'Nachname','email' => 'info@info.de','datum' => '2050-06-11','startZeit' => '14:00:00','endZeit' => '16:00:00','deleted_at' => NULL,'created_at' => '2023-03-18 13:55:33','updated_at' => '2023-03-18 13:55:33'),
                array('id' => '5','event_id' => '7','operational_location_id' => '3','timetabel_helper_lists_id' => '2','user_id' => NULL,'Vorname' => 'Vorname','Nachname' => 'Nachname','email' => 'info@info.de','datum' => '2050-06-11','startZeit' => '16:00:00','endZeit' => '18:00:00','deleted_at' => NULL,'created_at' => '2023-03-18 13:55:33','updated_at' => '2023-03-18 13:55:33'),
                array('id' => '6','event_id' => '7','operational_location_id' => '3','timetabel_helper_lists_id' => '2','user_id' => NULL,'Vorname' => 'Vorname','Nachname' => 'Nachname','email' => 'info1@info.de','datum' => '2050-06-11','startZeit' => '16:00:00','endZeit' => '18:00:00','deleted_at' => NULL,'created_at' => '2023-03-18 13:55:33','updated_at' => '2023-03-18 13:55:33'),
                array('id' => '7','event_id' => '7','operational_location_id' => '3','timetabel_helper_lists_id' => '2','user_id' => NULL,'Vorname' => 'Vorname','Nachname' => 'Nachname','email' => 'info2@info.de','datum' => '2050-06-11','startZeit' => '16:00:00','endZeit' => '18:00:00','deleted_at' => NULL,'created_at' => '2023-03-18 13:55:33','updated_at' => '2023-03-18 13:55:33'),
                array('id' => '8','event_id' => '7','operational_location_id' => '3','timetabel_helper_lists_id' => '1','user_id' => NULL,'Vorname' => 'Vorname','Nachname' => 'Nachname','email' => 'info1@info.de','datum' => '2050-06-11','startZeit' => '14:00:00','endZeit' => '16:00:00','deleted_at' => NULL,'created_at' => '2023-03-18 13:59:12','updated_at' => '2023-03-18 13:59:12'),
                array('id' => '9','event_id' => '7','operational_location_id' => '4','timetabel_helper_lists_id' => '5','user_id' => NULL,'Vorname' => 'Vorname','Nachname' => 'Nachname','email' => 'info1@info.de','datum' => '2050-06-11','startZeit' => '12:00:00','endZeit' => '14:00:00','deleted_at' => NULL,'created_at' => '2023-03-18 13:59:29','updated_at' => '2023-03-18 13:59:29'),
                array('id' => '10','event_id' => '7','operational_location_id' => '3','timetabel_helper_lists_id' => '1','user_id' => NULL,'Vorname' => 'Vorname','Nachname' => 'Nachname','email' => 'info1@info.de','datum' => '2050-06-11','startZeit' => '10:00:00','endZeit' => '12:00:00','deleted_at' => '2023-07-15 15:27:06','created_at' => '2023-07-15 15:26:58','updated_at' => '2023-07-15 15:27:06'),
                array('id' => '11','event_id' => '7','operational_location_id' => '3','timetabel_helper_lists_id' => '4','user_id' => NULL,'Vorname' => 'Vorname','Nachname' => 'Nachname','email' => 'info1@info.de','datum' => '2050-06-12','startZeit' => '12:00:00','endZeit' => '14:00:00','deleted_at' => NULL,'created_at' => '2023-07-15 15:27:11','updated_at' => '2023-07-15 15:27:11')
            )
        );
    }
}
