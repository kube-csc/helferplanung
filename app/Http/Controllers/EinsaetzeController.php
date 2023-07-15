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

        $timetabelHelperLists = TimetabelHelperList::select('timetabel_helper_lists.*')
            ->join('operational_locations', 'operational_locations.id', '=', 'timetabel_helper_lists.operational_location_id')
            ->where('timetabel_helper_lists.event_id' , $event_id)
            ->orderBy('operational_locations.einsatzort')
            ->orderBy('timetabel_helper_lists.datum')
            ->orderBy('timetabel_helper_lists.startZeit')
            ->get();

        $noData=1;
        if(isset($_COOKIE['log_remember'])) {
            $OperationalBookingCount = OperationalBooking::where('email', $_COOKIE['log_remember'])->count();
            if($OperationalBookingCount>0){
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
