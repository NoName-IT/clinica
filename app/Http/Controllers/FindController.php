<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Address\CityController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Input;
use App\City;
use App\Patient;

class FindController extends Controller
{
    //
      public function __construct()
    {
        $this->middleware('auth');
    }
    
	public function find($clase, $campo, $completo)	//Recibe la clase de la cual desea buscar...
	{
		
			//dd($clase, $campo);
			$model = "App\\" . $clase;
	 		$term = Input::get('term');
		   	if (strlen($term) >= '3' ) {
		   		$registros = $model::where( $campo, 'LIKE', '%'.$term.'%')->get();
		   		//dd($registros);
		  	 	if ( $completo != 'Completo' ) {
		  	 		$result = self::stringDevolucion( $clase , $registros, $completo) ;
		  	 	} else {
		  	 		$result = self::stringDevolucion( $clase , $registros, $completo) ;
		  	 	}
		  	} else {
		  		$result = "Minimo dos caracteres";
		  	}
		  	//dd($result);
		    return Response::json($result);
	}

	public function stringDevolucion( $clase, $registros, $completo ){
		//dd( $registros );
		
		if ( $registros->isEmpty() ) 
		{	
			$resultados[] = ['id' => 0, 'value' => "No se encontraron resultados..."];
			//dd($resultados);
		} else 	{
			switch ($clase) {
			case 'City':
				if ($completo == 'Compsleto') {
					$resultados[0] = 'Datos de la Ciudad completa';
				} else {
					foreach ($registros as $registro) {
		            	//dd($city->department->province->name);
		            	$resultados[] =  [ 'id' => $registro->id , 'value' => $registro->name .', '. $registro->department->name .', '. $registro->department->province->name];
		        	}
		        }
				break;
			case 'Patient':
				if ($completo == 'Completo') {
						foreach ($registros as $registro) {
		            	//dd($city->department->province->name);
						$city = new CityController;
						$patient = Patient::findOrFail($registro->id);
						
						//dd($patient->get_last_medical_insurance());
		            	$resultados[] = [ 	'id' => $registro->id , 
		            						'value' => $registro->dni,
		            						'first_name' => $registro->first_name ,
		            						'last_name' => $registro->last_name ,
		            						'birth_date' => $registro->birth_date ,
		            						'birth_town' => $registro->birth_town ,
		            						'birth_town_text' => $city->getCityString($registro->birth_town),
		            						'birth_time' => $registro->birth_time ,
		            						'civil_status_id' => $registro->civil_status_id ,
		            						'dni_type_id' => $registro-> dni_type_id,
		            						'dni' => $registro->dni ,
		            						'street_address' => $registro->street_address ,
		            						'town' => $registro->town ,
		            						'town_text' => $city->getCityString($registro->town),
		            						'phone' => $registro->phone ,
		            						'blood_type_id' => $registro->blood_type_id ,
		            						'dni_copy' => $registro->dni_copy ,
		            						'medical_insurance_copy' => $registro->medical_insurance_copy,
		            						'medical_insurance' => $patient->get_last_medical_insurance(),
		            						'coinsurance' => $patient->get_last_medical_coinsurance(),

		            					];
		        	}
				} else {
					$resultados[0] = 'Datos de paciente no completo';
				}
				break;
			default:	//Si no recibe una clase...
				$resultados[] = ['id' => 0, 'value' => "No existe esa búsqueda"];
				break;
			//Falta agregar un ELSE para que si no trae nada siempre devuelva resultados con algun valor o declarar la clase antes y listo.
			} //Cierre del Switch	

		return $resultados;
		} //Cierre del If
	}




}