<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Internment extends Model
{
    //

    protected $fillable = [
        'diagnostic', 'room', 'clinic_history', 'initial_date', 'final_date',
    ];

    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }

    public function medics()
    {
        return $this->belongsToMany('App\Medic')->withTimestamps();
    }

}
