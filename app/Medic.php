<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medic extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'first_name', 'last_name', 'cuit', 'dni', 'medic_type_id', 'license', 'street_address', 'blood_type_id', 'phone', 'email',
    ];

    public function internments()
    {
        return $this->belongsToMany('App\Internment')->withPivot('initial_date', 'final_date')->withTimestamps();;
    }

    public function medic_type()
    {
        return $this->belongsTo('App\MedicType');
    }

    public function blood_type()
    {
        return $this->belongsTo('App\BloodType');
    }
    public function getFullNameAttribute() 
    {
        return ucfirst($this->first_name) . ' ' . ucfirst($this->last_name);
    }

   public static function getMedics()
    {
        $medics = Medic::where('medic_type_id','1')->get();
        //dd($medic);
        return $medics;
    }    

   public static function getPsychologists()
    {
        $medics = Medic::where('medic_type_id','2')->get();
        //dd($medic);
        return $medics;
    }    


}
