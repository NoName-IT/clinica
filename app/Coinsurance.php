<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Coinsurance extends Model
{
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
        'name', 'affiliate_type', 'module', 'available_days', 'renovation_days', 'price_per_day', 'coverage', 'iva', 
    ];
    

    public function patients()
    {
        return $this->belongsToMany('App\Patient');
    }


}
