<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class timetabelHelperList extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function operationalLocation()
    {
        return $this->belongsTo(OperationalLocation::class);
    }

    /*
    public function operationalLocation()
    {
        return $this->hasMany(OperationalLocation::class);
    }
    */
}
