<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHelperListRequest;
use App\Models\Event;
use App\Models\OperationalBooking;
use Illuminate\Support\Carbon;


class HelperListController extends Controller
{
    public function loginCheck(StoreHelperListRequest $Request)
    {
        $OperationalBookingCount=OperationalBooking::where('email' , $Request->loginEmail)
            ->where('datum', '>=' , Carbon::now())
            ->count();

        if($Request->loginEmail<>"" and $Request->inputAngemeldet=="remember-me" and !isset($_COOKIE['cookie_consent'])) {
            $minutes = time()+(86400 * 365); //86400=1day
            setcookie('log_remember', $Request->loginEmail, $minutes, "/");
        }

        if($OperationalBookingCount>0) {
            $OperationalBookings = OperationalBooking::where('datum', '>=', Carbon::now())
                ->orderBy('datum')
                ->orderBy('operational_location_id')
                ->orderBy('startZeit')
                ->get();
        }
        else{
            return view('pages.emailLoginFale');
        }
        return view('pages.helferList' , [
                     'OperationalBookings' => $OperationalBookings,
                     'loginEmail'          => $Request->loginEmail
        ]);
    }

    public function helperList()
    {
        $OperationalBookings = OperationalBooking::where('datum', '>=', Carbon::now())
            ->orderBy('datum')
            ->orderBy('operational_location_id')
            ->orderBy('startZeit')
            ->get();

        return view('pages.helferList' , [
            'OperationalBookings' => $OperationalBookings,
            'loginEmail'          => $_COOKIE['log_remember']
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OperationalBooking  $operationalBooking
     * @return \Illuminate\Http\Response
     */
    public function destroy($operationalBookings_id)
    {
      //
    }

    public function softDelete($operationalBookings_id)
    {
        $OperationalBooking=OperationalBooking::find($operationalBookings_id);
        $delete = OperationalBooking::find($operationalBookings_id)->delete();

        $OperationalBookingCount = OperationalBooking::where('email', $_COOKIE['log_remember'])->count();
        if($OperationalBookingCount>0) {
            $minutes = time() + (86400 * 365); //86400=1day
            setcookie('log_remember', $_COOKIE['log_remember'], $minutes, "/");

            return view('pages.helferList' , [
                'OperationalBookings' => $OperationalBookings,
                'loginEmail'          => $_COOKIE['log_remember']
            ]);
        }
        else
        {
            setcookie('log_remember', '', time()-1);

            $event=Event::find($OperationalBooking->event_id);
            $datumvon=date('d.m.Y', strtotime($event->datumvon));

            return to_route('einsaetze' , [
                'event_id' => $OperationalBooking->event_id,
                'key'      => $datumvon,
                'noData'   => 1
            ]);
        }
    }
}
