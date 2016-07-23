<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InternmentMedic extends Model
{
    //
	use SoftDeletes;



    protected $dates = ['deleted_at'];

    protected $table = 'internment_medic';

    public static function getLastInternmentMedic($internment_id){
    	$medic = new InternmentMedic;
    	return $medic->where('internment_id', $internment_id)->orderby('created_at', 'desc')->first();

    }

}
