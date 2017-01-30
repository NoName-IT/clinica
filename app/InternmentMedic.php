<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InternmentMedic extends Model
{
    //
	use SoftDeletes;
	//1 Medico
	//2 Psicologo


    protected $dates = ['deleted_at'];

    protected $table = 'internment_medic';


 //    public function medic()
 //    {
 //        return $this->hasOne('App\Medic', 'id', 'medic_id');
 //    }
 //    public function internment()
 //    {
 //        return $this->hasMany('App\Internment');
 //    }    


 //    public static function lastInternmentMedic($internment_id){
 //    	//$medic = new InternmentMedic;
 //        //Devuelve los médicos de la internación 1.
 //        $internment = InternmentMedic::where('internment_id', $internment_id)->orderby('created_at', 'desc')->first();
 //        dd($internment);
    	
 //        //Retorna el último medico de la internacion $internment_id
 //    	$medic_internment_id = $internment->where('internment_id', $internment_id)->where('medic_id', '1')->orderby('created_at', 'desc')->first();

 //        //return medico completo

 //    }
	// public static function lastInternmentPsychologist($internment_id){
 //    	$medic = new InternmentMedic;
 //    	//Retorna el último psicólogo de la internacion $internment_id    	
 //    	return $medic->where('internment_id', $internment_id)->where('medic_type_id', '2')->orderby('created_at', 'desc')->first();

 //    }

}
