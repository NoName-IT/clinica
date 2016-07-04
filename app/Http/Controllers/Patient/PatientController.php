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
use Carbon\Carbon;
use App\Http\Controllers\Address\CityController;



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

        $patient = new Patient($request->all());

        $patient->civil_status_id =  $request->civil_status;
        $patient->blood_type_id =  $request->blood_type;
        $patient->dni_type_id =  $request->dni_type;
        
        $patient->save();

        if ($request->medical_insurance){
            $patient->medical_insurances()->attach($request->medical_insurance, ['initial_date' => Carbon::now()]);
        }

        if ($request->coinsurance){
            $patient->coinsurances()->attach($request->coinsurance, ['initial_date' => Carbon::now()]);
        }

        Flash::success(trans('general.patient_created'));

        return redirect()->route('patients.index');
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
        $town = CityController::getCity($patient->town);
        $birth_town = CityController::getCity($patient->birth_town);

        //$medical_insurance_patient = $patient->medical_insurances->last();

        $medical_insurance_patient =  $patient->medical_insurances()->where('final_date','0000-00-00 00:00:00')->first();
     
        //$coinsurance_patient = $patient->coinsurances->last();

        $coinsurance_patient = $patient->coinsurances()->where('final_date','0000-00-00 00:00:00')->first();
     
        return view('patients.edit')->with('patient', $patient)->with('blood_types', $blood_types)->with('civil_statuses', $civil_statuses)->with('coinsurances', $coinsurances)->with('medical_insurances', $medical_insurances)->with('dni_types', $dni_types)->with('medical_insurance_patient', $medical_insurance_patient)->with('coinsurance_patient', $coinsurance_patient)->with('town', $town)->with('birth_town', $birth_town);

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
        //dd($request->all());

        $patient = Patient::findOrFail($id);

        $patient_new = $request->all();

        $patient->fill($patient_new);

        $patient->civil_status_id =  $request->civil_status;
        $patient->blood_type_id =  $request->blood_type;
        $patient->dni_type_id =  $request->dni_type;

        
        if ($request->dni_copy) {
            $patient->dni_copy = '1';
        }else{
            $patient->dni_copy = '0';
        }

        if ($request->medical_insurance_copy) {
            $patient->medical_insurance_copy = '1';
        }else{
            $patient->medical_insurance_copy = '0';
        }

        $patient->save();

        $medical_insurance = $patient->medical_insurances()->where('final_date','0000-00-00 00:00:00')->first();

        if ($request->medical_insurance){
            
            if ($medical_insurance){

                if ($medical_insurance->id != $request->medical_insurance ){
            
                    $medical_insurance->pivot->final_date = Carbon::now();
                    $medical_insurance->pivot->save();

                    $patient->medical_insurances()->attach($request->medical_insurance, ['initial_date' => Carbon::now()]);

                }
            }else{
                $patient->medical_insurances()->attach($request->medical_insurance, ['initial_date' => Carbon::now()]);
            }

        }else{
            if ($medical_insurance){

                $medical_insurance->pivot->final_date = Carbon::now();
                $medical_insurance->pivot->save();
            }
        }

        $coinsurance = $patient->coinsurances()->where('final_date','0000-00-00 00:00:00')->first();

        if ($request->coinsurance){

            if ($coinsurance){

                if ($coinsurance->id != $request->coinsurance ){
            
                    $coinsurance->pivot->final_date = Carbon::now();
                    $coinsurance->pivot->save();

                    $patient->coinsurances()->attach($request->coinsurance, ['initial_date' => Carbon::now()]);

                }
            }else{
                $patient->coinsurances()->attach($request->coinsurance, ['initial_date' => Carbon::now()]);
            }
            
        }else{
            if ($coinsurance){

                $coinsurance->pivot->final_date = Carbon::now();
                $coinsurance->pivot->save();
            }
        }

        Flash::success(trans('general.patient_edited'));

        return redirect()->route('patients.index');
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
