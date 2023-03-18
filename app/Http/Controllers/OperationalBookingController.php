<?php

namespace App\Http\Controllers;

use App\Models\OperationalBooking;
use App\Models\TimetabelHelperList;
use App\Http\Requests\StoreOperationalBookingRequest;
use App\Http\Requests\UpdateOperationalBookingRequest;

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
            //$ait=strtotime($operationalTime);
            $eit=strtotime($operatingPlan->endZeit);
            $dith=date('H' , strtotime($operatingPlan->laenge));
            $ditm=date('i' , strtotime($operatingPlan->laenge));
            $dit=$dith*60*60+$ditm*60;
            $endzeit=date('H:i' , $operationalTime+$dit);
            //$event_id=$operatingPlan->event_id;
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
                'endzeit'                 => $endzeit,
                //'event_id'                => $event_id
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
        $validatedData = $request->validated();
        $operatingPlan = OperationalBooking::create($validatedData);
        $datumvon=date('d.m.Y', strtotime($request->datumvon));

        return to_route('einsaetze' , [
            'event_id' => $request->event_id,
            'key' => $datumvon
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
}
