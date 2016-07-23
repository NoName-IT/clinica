<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Medic;
use App\InternmentMedic;

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
/*
    public function medics()
    {
        return $this->belongsToMany('App\Medic')->withTimestamps();
    }
*/
    public function medics()
    {
        return $this->belongsToMany('App\Medic')->withPivot('initial_date', 'final_date')->withTimestamps();
    }
    
    public function witnesses()
    {
        return $this->hasMany('App\Witness');
    }
    public function discharge_type()
    {
        return $this->belongsTo('App\DischargeType');
    }

    public function getMedicFullNameAttribute(){
        $internment_medic = InternmentMedic::getLastInternmentMedic($this->id);
        dd($internment_medic);
        $medic =  Medic::findOrFail(200)->first();
        return ucfirst('s');
   
        //return ucfirst($this->first_name) . ' ' . ucfirst($this->last_name);
    }
    public function getPsychologistFullNameAttribute(){
        
    }


}
