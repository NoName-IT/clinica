<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Internment extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

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
