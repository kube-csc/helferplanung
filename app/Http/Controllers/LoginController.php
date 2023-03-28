<?php

namespace App\Http\Controllers;

use App\Models\OperationalBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class LoginController extends Controller
{
    public function Logout()
    {
        setcookie('log_remember', '', time()-1);
        return view('pages.emailLogin');
    }

    public function emailLogin()
    {
        return view('pages.emailLogin');
    }

}
