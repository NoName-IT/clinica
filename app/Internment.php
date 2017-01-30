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
        'diagnostic', 'diagnostic_2', 'order', 'room', 'discharge_type', 'initial_date', 'final_date',
    ];

    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }

    public function medics()
    {
        return $this->belongsToMany('App\Medic')->withTimestamps();
    }

    public  function lastMedicInternment()
    {
        $medic = $this->medics()->where('medic_type_id','1')->where('final_date','0000-00-00 00:00:00')->first();
        //dd($medic);
        return $medic;
    }
    
    public  function lastPsychologistInternment()
    {
        $medic = $this->medics()->where('medic_type_id','2')->where('final_date','0000-00-00 00:00:00')->first();
        //dd($medic);
        return $medic;
    }    

    public function witnesses()
    {
        return $this->hasMany('App\Witness');
    }

    public function diagnostics()
    {
        return $this->hasMany('App\Diagnostic');
    }
    
    public function discharge_type()
    {
        return $this->belongsTo('App\DischargeType');
    }

    // public function getLastMedicAttribute(){
    //     $internment_medic = InternmentMedic::getLastInternmentMedic($this->id);
    //     //dd($internment_medic);
    //     return $internment_medic;
   
    //     //return ucfirst($this->first_name) . ' ' . ucfirst($this->last_name);
    // }
    // public function getLastPsychologistAttribute(){
    //     $internment_medic = InternmentMedic::lastPsychologistInternment($this->id);
    //     return $internment_medic;
    // }

    public static function getNextOrder(){
        return Internment::max('order') + 1 ;
    }

}
