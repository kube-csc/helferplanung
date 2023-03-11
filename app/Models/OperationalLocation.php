<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OperationalLocation extends Model
{
    use SoftDeletes;

    protected $fillable = ['einsatzort', 'beschreibung', 'autor_id', 'bearbeiter_id', 'freigeber_id', 'letzteFreigabe'];
}
