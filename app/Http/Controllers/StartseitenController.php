<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\TimetabelHelperList;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class StartseitenController extends Controller
{
    public function getStartseitenDaten(){

        $events = Event::where('regatta' , '1')
                       ->where('datumbis' , '>=' , Carbon::now())
                       ->orderBy('datumvon' , 'DESC')
                       ->get();
        $eventCount = $events->count();

        $operatingPlans = TimetabelHelperList::where('startZeit' , '>=' , Carbon::now());
        $operatingPlansCount = $operatingPlans->count();

        return view('pages.startseite' , [
            'events' => $events,
            'eventCount' => $eventCount,
            'operatingPlans' => $operatingPlans,
            'operatingPlansCount' => $operatingPlansCount
        ]);

    }
}
