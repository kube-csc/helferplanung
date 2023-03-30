<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\OperationalBooking;
use App\Models\TimetabelHelperList;
use Illuminate\Http\Request;

class EinsaetzeController extends Controller
{
    public function getEinsaetzeDaten($event_id, $key )
    {
        $event = Event::find($event_id);

        $timetabelHelperLists=TimetabelHelperList::where('event_id' , $event_id)
            ->orderby('operational_location_id')
            ->orderby('datum')
            ->orderby('startZeit')
            ->get();

        $noData=1;
        if(isset($_COOKIE['log_remember'])) {
            $OperationalBookingCount = OperationalBooking::where('email', $_COOKIE['log_remember'])->count();
            if($OperationalBookingCount==0){
                $noData=0;
            }
        }

        return view('pages.einsaetze' , [
            'event' => $event,
            'timetabelHelperLists' => $timetabelHelperLists,
            'key' => $key,
            'noData' => $noData
        ]);
    }
}
