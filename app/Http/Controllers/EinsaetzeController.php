<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\TimetabelHelperList;
use Illuminate\Http\Request;

class EinsaetzeController extends Controller
{
    public function getEinsatätzeDaten($event_id)
    {
        $event = Event::find($event_id);

        $timetabelHelperLists=TimetabelHelperList::where('event_id' , $event_id)
            ->orderby('operational_location_id')
            ->orderby('startZeit')
            ->get();

        return view('pages.einsaetze' , [
            'event' => $event,
            'timetabelHelperLists' => $timetabelHelperLists,
        ]);
    }
}