<?php

namespace App\Http\Controllers\Witness;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\DniType;
use App\City;
use App\Relationship;
use App\Witness;
use Carbon\Carbon;

class WitnessController extends Controller
{

      public function __construct()
    {
        $this->middleware('auth');
    }
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function create()
    {
        $dni_types = DniType::get();
        $cities = City::get();
        $relationships =  Relationship::get();
        //dd($relationships);
        return view('witnesses.create')->with('dni_types', $dni_types)->with('cities', $cities)->with('relationships', $relationships);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public static function store($request)
    {
        //dd($request);
        $witness = new Witness;
        $witness->relationship_id = $request->relationship;
        $witness->first_name = $request->first_name;
        $witness->last_name = $request->last_name;
        $witness->dni_type = $request->dni_type;
        $witness->dni = $request->dni;
        $witness->age = Carbon::now()->diffInYears(new Carbon($request->birth_date));        
        $witness->street_address = $request->street_address;
        $witness->phone = $request->phone;
        $witness->responsible = $request->responsible;

        $witness->internment()->associate($request->internment_id);
        $witness->relationship()->associate($request->relationship);
        
        $witness->save();
        //dd($witness);
        //dd($patient);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
