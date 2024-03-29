<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InstructionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('instructions')->delete();

        DB::table('instructions')
            ->insert(
                [
                    array(
                        'id' => '1',
                        'ueberschrift'    => 'Datenschutzerklärung',
                        'beschreibung'    => 'Bitte geben Sie hier ihre Datenschutzerklärung ein.',
                        'hauptmenu'       => '0',
                        'hauptmenuspalte' => '0',
                        'systemmenu'      => '1',
                        'position'        => '10',
                        'route'           => 'x',
                        'visible'         => '1',
                        'user_id'         => '1',
                        'bearbeiter_id'   => '1',
                        'created_at'      => '2021-03-28 13:06:42',
                        'updated_at'      => '2021-03-28 13:06:42',
                    ),
                ]);
    }
}
