<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;



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
        'first_name', 'last_name', 'birth_date', 'status', 'birth_town', 'birth_time', 'dni_type_id', 'dni', 'street_address', 'town', 'phone', 'blood_type_id', 'dni_copy', 'medical_insurance_copy',
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

    public function getAgeAttribute() 
    {
        return Carbon::now()->diffInYears(new Carbon($this->birth_date));
    }

    public function getFullNameAttribute() 
    {
        return ucfirst($this->first_name) . ' ' . ucfirst($this->last_name);
    }

    public function medical_insurances()
    {
        return $this->belongsToMany('App\MedicalInsurance')->withPivot('initial_date', 'final_date', 'affiliate_number')->withTimestamps();
    }

    public function coinsurances()
    {
        return $this->belongsToMany('App\Coinsurance')->withPivot('initial_date', 'final_date', 'affiliate_number')->withTimestamps();
    }

    public function get_last_medical_insurance()
    {
        $medical_insurance = $this->medical_insurances()->where('final_date','0000-00-00 00:00:00')->first();
        if ( $medical_insurance ){
            $id = $medical_insurance->pivot->medical_insurance_id;
        } else {
            $id = 0;
        }
        return $id;
    }
    
    public function getLastMedicalInsuranceNameAttribute()
    {
        $medical_insurance = $this->medical_insurances()->where('final_date','0000-00-00 00:00:00')->first();
        if ( $medical_insurance ){
            $name = $medical_insurance->name;
        } else {
            $name = 'No tiene';
        }
        return $name;
    }    

    public function get_last_medical_coinsurance()
    {
        $medical_coinsurance = $this->coinsurances()->where('final_date','0000-00-00 00:00:00')->first();
        //dd($medical_coinsurance);
        if ( $medical_coinsurance ){
            $id = $medical_coinsurance->pivot->coinsurance_id;
        } else {
            $id = 0;
        }
        return $id;  
    }
    public function paychecks()
    {
        return $this->hasMany('App\Paycheck');
    }

    public function internments()
    {
        return $this->hasMany('App\Internment');
    }

    public function blood_type()
    {
        return $this->belongsTo('App\BloodType');
    }

    public function civil_status()
    {
        return $this->belongsTo('App\CivilStatus');
    }

    public function dni_type()
    {
        return $this->belongsTo('App\DniType');
    }

}
