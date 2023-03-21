<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\OperationalBooking;
use App\Models\TimetabelHelperList;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class StartseitenController extends Controller
{
    public function getStartseitenDaten(){

        $events = Event::where('regatta' , '1')
                       ->where('datumbis' , '>=' , Carbon::now())
                       ->orderBy('datumvon')
                       ->get();
        $eventCount = $events->count();

        $operatingPlans = TimetabelHelperList::where('startZeit' , '>=' , Carbon::now());
        //$operatingPlansCount = $operatingPlans->count();

        $operatingPlansCount=0;
        foreach($events as $event) {
                $freeOperationalplans = TimetabelHelperList::where('event_id' , $event->id )->get();
                foreach($freeOperationalplans as $freeOperationalplan) {
                    $ait = strtotime($freeOperationalplan->startZeit);
                    $dith = date('H', strtotime($freeOperationalplan->laenge));
                    $ditm = date('i', strtotime($freeOperationalplan->laenge));
                    $dit = $dith * 60 * 60 + $ditm * 60;
                    $eit = strtotime($freeOperationalplan->endZeit);
                    for ($i = $ait; $i < $eit; $i = $i + $dit) {
                        $operatingPlansCount=$operatingPlansCount+$freeOperationalplan->anzahlHelfer;
                    }
                }
        }

        $operatingBookCount = OperationalBooking::where('datum' , '>=' , Carbon::now() )->count();

        $operatingBookUsers = OperationalBooking::where('datum' , '>=' , Carbon::now() )->orderBy('email')->get();
        $emailmerk="";
        $operatingBookUserCount=0;
        foreach ($operatingBookUsers as $operatingBookUser){
            if($emailmerk<>$operatingBookUser->email) {
                $emailmerk=$operatingBookUser->email;
                ++$operatingBookUserCount;
            }
        }

        return view('pages.startseite' , [
            'events' => $events,
            'eventCount' => $eventCount,
            'operatingPlans' => $operatingPlans,
            'operatingPlansCount' => $operatingPlansCount,
            'operatingBookCount'  => $operatingBookCount,
            'operatingBookUserCount' => $operatingBookUserCount,
            'operatingBookUsers' =>$operatingBookUsers
        ]);
    }
}
