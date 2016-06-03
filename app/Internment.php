<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
