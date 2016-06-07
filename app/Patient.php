<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Patient extends Model
{
    //
    //
     use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'birth_date', 'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    /**
    protected $hidden = [
        'password', 'remember_token',
    ];
    **/

    public function getFullNameAttribute() 
    {
        return ucfirst($this->first_name) . ' ' . ucfirst($this->last_name);
    }


    public function medical_insurances()
    {
        return $this->belongsToMany('App\MedicalInsurance')->withPivot('initial_date', 'final_date')->withTimestamps();
    }

    public function coinsurances()
    {
        return $this->belongsToMany('App\Coinsurance');
    }

    public function paychecks()
    {
        return $this->hasMany('App\Paycheck');
    }

    public function internments()
    {
        return $this->hasMany('App\Internment');
    }

}
