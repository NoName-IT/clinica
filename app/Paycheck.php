<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paycheck extends Model
{
    //

    protected $fillable = [
        'year', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12',
    ];

    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }
}
