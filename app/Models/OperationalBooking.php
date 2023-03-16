<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OperationalBooking extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'event_id',
        'operational_location_id',
        'timetabel_helper_lists_id',
        'user_id',
        'datum',
        'startZeit',
        'endZeit',
    ];
}
