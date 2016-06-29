<?php

namespace App\Http\Controllers\MedicalInsurance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\MedicalInsurance;
use Laracasts\Flash\Flash;
use App\Http\Requests\StoreMedicalInsuranceRequest;


class MedicalInsuranceController extends Controller
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
        $medical_insurances = MedicalInsurance::orderBy('id','ASC')->paginate(10);

        return view('medical_insurances.index')->with('medical_insurances', $medical_insurances);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $affiliate_types = array('Obligatorio', 'Voluntario', 'Prepago');
        $modules = array('Agudo', 'Crónico', 'Dual');

        return view('medical_insurances.create')->with('affiliate_types', $affiliate_types)
                ->with('modules', $modules);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMedicalInsuranceRequest $request)
    {
        //

        $medical_insurance = new MedicalInsurance($request->all());

        $medical_insurance->save();

        Flash::success(trans('medical_insurance.medical_insurance_created'));

        return redirect()->route('medical_insurances.index');
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
        $medical_insurance = MedicalInsurance::findOrFail($id);
        $affiliate_types = array('Obligatorio', 'Voluntario', 'Prepago');
        $modules = array('Agudo', 'Crónico', 'Dual');

        return view('medical_insurances.edit')->with('medical_insurance', $medical_insurance)
                    ->with('affiliate_types', $affiliate_types)
                    ->with('modules', $modules);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreMedicalInsuranceRequest $request, $id)
    {
        //

        $medical_insurance = MedicalInsurance::findOrFail($id);

        $medical_insurance_new = $request->all();

        $medical_insurance->fill($medical_insurance_new);

        $medical_insurance->save();

        Flash::success(trans('general.medical_insurance_edited'));

        return redirect()->route('medical_insurances.index');
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
        $medical_insurance = MedicalInsurance::findOrFail($id);
        $medical_insurance->delete();

        return trans('medical_insurance.medical_insurance_deleted');
    }
}
