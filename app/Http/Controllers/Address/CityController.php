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
    public function getCities($id) 
        {
            $cities = City::where('department_id', '=', $id)->get();
            $options = array();

            foreach ($cities as $city) {
                $options += array($city->id => $city->name);
            }

            return Response::json($options);
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
}