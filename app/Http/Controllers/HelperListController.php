<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHelperListRequest;
use App\Models\OperationalBooking;
use Illuminate\Support\Carbon;


class HelperListController extends Controller
{
    public function emailLogin()
    {
        return view('pages.emailLogin');
    }

    public function loginCheck(StoreHelperListRequest $Request)
    {
        $OperationalBookingCount=OperationalBooking::where('email' , $Request->loginEmail)
            ->where('datum', '>=' , Carbon::now())
            ->count();

        if($Request->loginEmail<>"" and $Request->inputAngemeldet=="remember-me" and !isset($_COOKIE['cookie_consent'])) {
            $minutes = time()+(86400 * 365); //86400=1day
            setcookie('email', $Request->loginEmail, $minutes, "/");
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

    public function login()
    {
         $OperationalBookings = OperationalBooking::where('datum', '>=', Carbon::now())
                ->orderBy('datum')
                ->orderBy('operational_location_id')
                ->orderBy('startZeit')
                ->get();

        return view('pages.helferList' , [
            'OperationalBookings' => $OperationalBookings,
            'loginEmail'          => $_COOKIE['email']
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

        if(!isset($_COOKIE['email'])){
            return view('pages.emailLogin')->with(
                [
                    'datum' => $OperationalBooking->event->ueberschrift,
                    'endZeit' => $OperationalBooking->endZeit,
                    'endZeit' => $OperationalBooking->endZeit,
                    'success' => 'Der gebuchte Termin wurde storniert.'
                ]
            );
        }
        else {
            $OperationalBookings = OperationalBooking::where('datum', '>=', Carbon::now())
                ->orderBy('datum')
                ->orderBy('operational_location_id')
                ->orderBy('startZeit')
                ->get();

            return view('pages.helferList' , [
                    'OperationalBookings' => $OperationalBookings,
                    'loginEmail'          => $_COOKIE['email']
                ]
            );
        }
    }

}
