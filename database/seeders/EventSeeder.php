<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

                    \DB::table('events')->delete();

                            \DB::table('events')->insert(array (
                                /*
                                0 =>
                                    array (
                                        'id' => 1,
                                        'datumvon' => '2005-05-21',
                                        'datumbis' => '2005-05-22',
                                        'datumvona' => NULL,
                                        'datumbisa' => NULL,
                                        'ueberschrift' => 'Unser Verein',
                                        'beschreibung' => 'Hier steht die Vereinsbeschreibung',
                                        'ansprechpartner' => NULL,
                                        'telefon' => NULL,
                                        'email' => NULL,
                                        'homepage' => NULL,
                                        'sportSection_id' => '1',
                                        'startseite' => '',
                                        'nachtermin' => '',
                                        'anmeldetext' => '',
                                        'onlinemeldung' => '0',
                                        'created_at' => '2021-03-28 13:06:42',
                                        'regatta' => Null,
                                        'verwendung' => 4,
                                        'eventGroup_id' => NULL,
                                        'einverstaendnis' => '',
                                        'teilnehmer' => 0,
                                        'teilnehmermax' => 0,
                                        'autor_id' => 1,
                                        'bearbeiter_id' => 1,
                                        'updated_at' => '2021-03-28 13:06:42',
                                        'freigabe' => '',
                                    ),
                                1 =>
                                    array (
                                        'id' => 2,
                                        'datumvon' => '2005-06-11',
                                        'datumbis' => '2005-06-11',
                                        'datumvona' => NULL,
                                        'datumbisa' => NULL,
                                        'ueberschrift' => 'Abteilung 1',
                                        'beschreibung' => 'Hier steht die Beschreibung von der Abteilung 1',
                                        'ansprechpartner' => NULL,
                                        'telefon' => NULL,
                                        'email' => NULL,
                                        'homepage' => NULL,
                                        'sportSection_id' => '2',
                                        'startseite' => '',
                                        'nachtermin' => '',
                                        'anmeldetext' => '',
                                        'onlinemeldung' => '0',
                                        'created_at' => '2021-03-28 13:06:42',
                                        'regatta' => Null,
                                        'verwendung' => 4,
                                        'eventGroup_id' => NULL,
                                        'einverstaendnis' => '',
                                        'teilnehmer' => 0,
                                        'teilnehmermax' => 0,
                                        'autor_id' => 1,
                                        'bearbeiter_id' => 1,
                                        'updated_at' => '2021-03-28 13:06:42',
                                        'freigabe' => '',
                                    ),
                                2 =>
                                    array (
                                        'id' => 3,
                                        'datumvon' => '2005-06-11',
                                        'datumbis' => '2005-06-11',
                                        'datumvona' => NULL,
                                        'datumbisa' => NULL,
                                        'ueberschrift' => 'Abteilung 2',
                                        'beschreibung' => 'Hier steht die Beschreibung von der Abteilung 2',
                                        'ansprechpartner' => NULL,
                                        'telefon' => NULL,
                                        'email' => NULL,
                                        'homepage' => NULL,
                                        'sportSection_id' => '3',
                                        'startseite' => '',
                                        'nachtermin' => '',
                                        'anmeldetext' => '',
                                        'onlinemeldung' => '0',
                                        'created_at' => '2021-03-28 13:06:42',
                                        'regatta' => Null,
                                        'verwendung' => 4,
                                        'eventGroup_id' => NULL,
                                        'einverstaendnis' => '',
                                        'teilnehmer' => 0,
                                        'teilnehmermax' => 0,
                                        'autor_id' => 1,
                                        'bearbeiter_id' => 1,
                                        'updated_at' => '2021-03-28 13:06:42',
                                        'freigabe' => '',
                                    ),
                                3 =>
                                    array (
                                        'id' => 4,
                                        'datumvon' => '2005-06-11',
                                        'datumbis' => '2005-06-11',
                                        'datumvona' => NULL,
                                        'datumbisa' => NULL,
                                        'ueberschrift' => 'Mannschaft 1',
                                        'beschreibung' => 'Hier steht die Beschreibung von der Mannschaft 1',
                                        'ansprechpartner' => NULL,
                                        'telefon' => NULL,
                                        'email' => NULL,
                                        'homepage' => NULL,
                                        'sportSection_id' => '4',
                                        'startseite' => '',
                                        'nachtermin' => '',
                                        'anmeldetext' => '',
                                        'onlinemeldung' => '0',
                                        'created_at' => '2021-03-28 13:06:42',
                                        'regatta' => Null,
                                        'verwendung' => 4,
                                        'eventGroup_id' => NULL,
                                        'einverstaendnis' => '',
                                        'teilnehmer' => 0,
                                        'teilnehmermax' => 0,
                                        'autor_id' => 1,
                                        'bearbeiter_id' => 1,
                                        'updated_at' => '2021-03-28 13:06:42',
                                        'freigabe' => '',
                                    ),
                                4 =>
                                    array (
                                        'id' => 5,
                                        'datumvon' => '2005-06-11',
                                        'datumbis' => '2005-06-11',
                                        'datumvona' => NULL,
                                        'datumbisa' => NULL,
                                        'ueberschrift' => 'Mannschaft 2',
                                        'beschreibung' => 'Hier steht die Beschreibung von der Mannschaft 2',
                                        'ansprechpartner' => NULL,
                                        'telefon' => NULL,
                                        'email' => NULL,
                                        'homepage' => NULL,
                                        'sportSection_id' => '5',
                                        'startseite' => '',
                                        'nachtermin' => '',
                                        'anmeldetext' => '',
                                        'onlinemeldung' => '0',
                                        'created_at' => '2021-03-28 13:06:42',
                                        'regatta' => Null,
                                        'verwendung' => 4,
                                        'eventGroup_id' => NULL,
                                        'einverstaendnis' => '',
                                        'teilnehmer' => 0,
                                        'teilnehmermax' => 0,
                                        'autor_id' => 1,
                                        'bearbeiter_id' => 1,
                                        'updated_at' => '2021-03-28 13:06:42',
                                        'freigabe' => '',
                                    ),
                                5 =>
                                    array (
                                        'id' => 6,
                                        'datumvon' => '2021-06-11',
                                        'datumbis' => '2021-06-11',
                                        'datumvona' => NULL,
                                        'datumbisa' => NULL,
                                        'ueberschrift' => 'Eventsersie 1',
                                        'beschreibung' => 'Hier steht die Beschreibung von der Eventserie 1',
                                        'ansprechpartner' => NULL,
                                        'telefon' => NULL,
                                        'email' => NULL,
                                        'homepage' => NULL,
                                        'sportSection_id' => '5',
                                        'startseite' => '',
                                        'nachtermin' => 'Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic q
                                    Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic q
                                    ',
                                        'anmeldetext' => '',
                                        'onlinemeldung' => '0',
                                        'created_at' => '2021-03-28 13:06:42',
                                        'regatta' => Null,
                                        'verwendung' => 0,
                                        'eventGroup_id' => 1,
                                        'einverstaendnis' => '',
                                        'teilnehmer' => 0,
                                        'teilnehmermax' => 0,
                                        'autor_id' => 1,
                                        'bearbeiter_id' => 1,
                                        'updated_at' => '2021-03-28 13:06:42',
                                        'freigabe' => '',
                                    ),
                                */
                                6 =>
                                    array (
                                        'id' => 7,
                                        'datumvon' => '2050-06-11',
                                        'datumbis' => '2050-06-12',
                                        'datumvona' => NULL,
                                        'datumbisa' => NULL,
                                        'ueberschrift' => 'Eventsersie 2',
                                        'beschreibung' => 'Hier steht die Beschreibung von der Eventserie 2.
                                     Das Event ist ein Event der Mannschaft 2.
                                     Es wird eine Regatta zu diesem Event durchgeführt.
                                     ',
                                        'ansprechpartner' => 'Teamleiter',
                                        'telefon' => '23456 7890543',
                                        'email' => 'teamleiter@email.de',
                                        'homepage' => 'Homepage',
                                        'sportSection_id' => '5',
                                        'startseite' => '',
                                        'nachtermin' => '',
                                        'anmeldetext' => '',
                                        'onlinemeldung' => '0',
                                        'created_at' => '2021-03-28 13:06:42',
                                        'regatta' => 1,
                                        'verwendung' => 0,
                                        'eventGroup_id' => 2,
                                        'einverstaendnis' => '',
                                        'teilnehmer' => 0,
                                        'teilnehmermax' => 0,
                                        'autor_id' => 1,
                                        'bearbeiter_id' => 1,
                                        'updated_at' => '2021-03-28 13:06:42',
                                        'freigabe' => '',
                                    ),
                    ));
    }
}
