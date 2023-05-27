<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\OperationalBooking;
use App\Models\TimetabelHelperList;
use App\Http\Requests\StoreOperationalBookingRequest;
use App\Http\Requests\UpdateOperationalBookingRequest;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class OperationalBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($operationalplan_id, $operationalTime)
    {
            $operatingPlan = TimetabelHelperList::find($operationalplan_id);

            $eventDatum=date('d.m.Y', strtotime($operatingPlan->Event->datumvon));
            $operationalDatum=date('d.m.Y', strtotime($operatingPlan->datum));
            $datum=date('d.m.Y', $operationalTime);
            $startzeit=date('H:i', $operationalTime);
            $eit=strtotime($operatingPlan->endZeit);
            $dith=date('H' , strtotime($operatingPlan->laenge));
            $ditm=date('i' , strtotime($operatingPlan->laenge));
            $dit=$dith*60*60+$ditm*60;
            $endzeit=date('H:i' , $operationalTime+$dit);
            if($operationalTime+$dit > $eit){
                $endzeit=date('H:i' , $eit);
            }

        return view('pages.operationalBooking' , [
            'operatingPlan'           => $operatingPlan,
            'operational_location_id' => $operatingPlan->operational_location_id,
            'eventDatum'              => $eventDatum,
            'operationalDatum'        => $operationalDatum,
            'datum'                   => $datum,
            'startzeit'               => $startzeit,
            'endzeit'                 => $endzeit
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOperationalBookingRequest  $request
     * @return \Illuminate\Http\Response
     */

    public function store(StoreOperationalBookingRequest $request)
    {
        //$validatedData = $request->validated();
        //$operatingPlan = OperationalBooking::create($validatedData);

        $OperationalBooking= new OperationalBooking(
            [
                'event_id'                 => $request->event_id,
                'operational_location_id'  => $request->operational_location_id,
                'timetabel_helper_lists_id'=> $request->timetabel_helper_lists_id,
                'user_id'                  => $request->user_id,
                'Vorname'                  => $request->Vorname,
                'Nachname'                 => $request->Nachname,
                'email'                    => Str::lower($request->email),
                'datum'                    => $request->datumvon,
                'startZeit'                => $request->startZeit,
                'endZeit'                  => $request->endZeit,
                'updated_at'               => Carbon::now(),
                'created_at'               => Carbon::now()
            ]
        );
        $OperationalBooking->save();

        $datumvon=date('d.m.Y', strtotime($request->datumvon));
           if($request->email<>"" and isset($_COOKIE['__cookie_consent'])) {
            $minutes = time()+(86400 * 365); //86400=1day
            setcookie('log_remember', Str::lower($request->email), $minutes, "/");
        }
        $noData=0;

        return to_route('einsaetze' , [
            'event_id' => $request->event_id,
            'key'      => $datumvon,
            'noData'   => $noData
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OperationalBooking  $operationalBooking
     * @return \Illuminate\Http\Response
     */
    public function show(OperationalBooking $operationalBooking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OperationalBooking  $operationalBooking
     * @return \Illuminate\Http\Response
     */
    public function edit(OperationalBooking $operationalBooking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOperationalBookingRequest  $request
     * @param  \App\Models\OperationalBooking  $operationalBooking
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOperationalBookingRequest $request, OperationalBooking $operationalBooking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OperationalBooking  $operationalBooking
     * @return \Illuminate\Http\Response
     */
    public function destroy(OperationalBooking $operationalBooking)
    {
        //
    }

    public function createDirekt($operationalplan_id, $datum, $ah, $eh)
    {
        $operatingPlan = TimetabelHelperList::find($operationalplan_id);
        $event = Event::find($operatingPlan->event_id);
        $operationalBookingOlds = OperationalBooking::where('email', $_COOKIE['log_remember'])
            ->orderBy('datum')
            ->orderBy('startZeit')
            ->limit(1)
            ->get();

       foreach($operationalBookingOlds as $operationalBookingOld){
            $OperationalBooking = new OperationalBooking();
            $OperationalBooking->event_id = $operatingPlan->event_id;
            $OperationalBooking->operational_location_id = $operatingPlan->operational_location_id;
            $OperationalBooking->timetabel_helper_lists_id = $operationalplan_id;
            $OperationalBooking->Vorname = $operationalBookingOld->Vorname;
            $OperationalBooking->Nachname = $operationalBookingOld->Nachname;
            $OperationalBooking->email = $_COOKIE['log_remember'];
            $OperationalBooking->datum = $datum;
            $OperationalBooking->startZeit = $ah;
            $OperationalBooking->endZeit = $eh;
            $OperationalBooking->save();
       }

        $datumvon=date('d.m.Y', strtotime($event->datumvon));

        return to_route('einsaetze' , [
            'event_id' => $operatingPlan->event_id,
            'key'      => $datumvon
        ]);
    }

    public function softDeleteDirekt($operationalBookings_id)
    {
        $OperationalBooking=OperationalBooking::find($operationalBookings_id);
        $event=Event::find($OperationalBooking->event_id);
        $datumvon=date('d.m.Y', strtotime($event->datumvon));
        $delete = OperationalBooking::find($operationalBookings_id)->delete();

        //$noData=1;
        if(isset($_COOKIE['log_remember'])) {
            $OperationalBookingCount = OperationalBooking::where('email', $_COOKIE['log_remember'])->count();
            if ($OperationalBookingCount > 0) {
                if (isset($_COOKIE['__cookie_consent'])) {
                    $minutes = time() + (86400 * 364); //86400=1day
                    setcookie('log_remember', $_COOKIE['log_remember'], $minutes, "/");
                    //$noData = 0;
                }
            } else {
                setcookie('log_remember', '', time() - 1);

            }
        }

        return to_route('einsaetze' , [
            'event_id' => $OperationalBooking->event_id,
            'key'      => $datumvon,
            //'noData'   => $noData
        ]);
    }
}
