<?php

namespace App\Http\Controllers\Address;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\City;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Input;

class CityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public static function getCity($id) 
        {
            $cities = City::findOrFail($id);
            $options = array( 'id' => $cities->id , 'value' => $cities->name .', '. $cities->department->name .', '. $cities->department->province->name);
            //dd($options);
            
            return $options;
        }

    public function getCityString($id){
            $cities = City::findOrFail($id);
            return $cities->name .', '. $cities->department->name .', '. $cities->department->province->name;
    }


    public function find()
        {
            $term = Input::get('term');
            if (strlen($term) >= '3' ){
                $cities = City::where('name', 'LIKE', '%'.$term.'%')->get();
                //dd($cities);
                $options = array();
                foreach ($cities as $city) {
                    //dd($city->department->province->name);
                    $options[] =  [ 'id' => $city->id , 'value' => $city->name .', '. $city->department->name .', '. $city->department->province->name];
                }
            }
            else 
            {
                $options = "minimo dos caracteres";
            }
            return Response::json($options);
        }

  /*  public function getCityString($id) 
        {
            $cities = City::findOrFail($id);
            $options = $cities->name .', '. $cities->department->name .', '. $cities->department->province->name);
            //dd($options);
            
            return $options;
        }
    */


}