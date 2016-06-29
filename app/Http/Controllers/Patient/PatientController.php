<?php

namespace App\Http\Controllers\Patient;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\UpdatePatientRequest;
use App\Http\Requests;
use Validator;
use Laracasts\Flash\Flash;
use Auth;        
use App\Patient;
use App\DniType;
use App\BloodType; 
use App\CivilStatus;
use App\Coinsurance;
use App\MedicalInsurance;
use App\City;


class PatientController extends Controller
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
        $patients = Patient::orderBy('id','ASC')->paginate(10);

        return view('patients.index')->with('patients', $patients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $blood_types = BloodType::get();
        $civil_statuses = CivilStatus::get();
        $coinsurances = Coinsurance::get();
        $medical_insurances = MedicalInsurance::get();
        $dni_types = DniType::get();
        $cities = City::get();

        return view('patients.create')->with('blood_types', $blood_types)->with('civil_statuses', $civil_statuses)->with('coinsurances', $coinsurances)->with('medical_insurances', $medical_insurances)->with('dni_types', $dni_types)->with('cities', $cities);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePatientRequest $request)
    {
        //
        dd($request->all());
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
        $patient = Patient::findOrFail($id);
        $blood_types = BloodType::get();
        $civil_statuses = CivilStatus::get();
        $coinsurances = Coinsurance::get();
        $medical_insurances = MedicalInsurance::get();
        $dni_types = DniType::get();
        $cities = City::get();

        $medical_insurance_patient = $patient->medical_insurances->last();
     
        $coinsurance_patient = $patient->coinsurances->last();
     
        return view('patients.edit')->with('patient', $patient)->with('blood_types', $blood_types)->with('civil_statuses', $civil_statuses)->with('coinsurances', $coinsurances)->with('medical_insurances', $medical_insurances)->with('dni_types', $dni_types)->with('cities', $cities)->with('medical_insurance_patient', $medical_insurance_patient)->with('coinsurance_patient', $coinsurance_patient);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePatientRequest $request, $id)
    {
        //
        dd($request->all());
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
        $patient = Patient::findOrFail($id);
        $patient->delete();

        return trans('patient.patient_deleted');
    }
}
