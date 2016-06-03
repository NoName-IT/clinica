<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coinsurance extends Model
{
    //

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
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

    public function patients()
    {
        return $this->belongsToMany('App\Patient');
    }


}
