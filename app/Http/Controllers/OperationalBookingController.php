<?php

namespace App\Http\Controllers;

use App\Models\OperationalBooking;
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOperationalBookingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOperationalBookingRequest $request)
    {
        //
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

    public function operationalBooking(OperationalBooking $operationalBooking)
    {
        return view('pages.operationalBooking');
    }
}
