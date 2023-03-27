<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OperationalBooking extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    use SoftDeletes;

    protected $fillable = [
        'Vorname',
        'Nachname',
        'event_id',
        'operational_location_id',
        'timetabel_helper_lists_id',
        'user_id',
        'email',
        'datum',
        'startZeit',
        'endZeit'
    ];

    protected $dates = [ 'deleted_at' ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function operationalLocation()
    {
        return $this->belongsTo(OperationalLocation::class);
    }
}
