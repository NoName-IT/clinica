<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class BloodType extends Model
{
    //

    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name', 
    ];
    

    public function patients()
    {
        return $this->hasMany('App\Patient');
    }

    public function medics()
    {
        return $this->hasMany('App\Medic');
    }
}
