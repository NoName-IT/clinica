<?php

namespace App\Http\Controllers\Internment;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Patient\PatientController;
use Laracasts\Flash\Flash;
use App\Internment;
use App\Patient;
use App\DniType;
use App\BloodType; 
use App\CivilStatus;
use App\Coinsurance;
use App\MedicalInsurance;
use App\City;
use App\Relationship;
use Carbon\Carbon;
use App\Http\Controllers\Address\CityController;
use App\Http\Requests\StoreInternmentPatientRequest;
use App\Http\Requests\StoreWitnessRequest;
use App\Http\Requests\StoreInternmentConfirmRequest;
use App\Http\Controllers\Witness\WitnessController;
use App\Medic;
use App\InternmentMedic;
use App\DischargeType;

class InternmentController extends Controller
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
        //
        $internments = Internment::orderBy('id','DESC')->paginate(10);
        return view('internments.index')->with('internments', $internments);

        //$internment = Internment::findOrFail('200');   

        //return view('pdf.clinichistory')->with('internment', $internment);
        //return view('pdf.internmentfeelingly')->with('internment', $internment);
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
        //$next_history_clinic = Patient::getNextHistoryClinic();     
        return view('internments.create')->with('blood_types', $blood_types)->with('civil_statuses', $civil_statuses)->with('coinsurances', $coinsurances)->with('medical_insurances', $medical_insurances)->with('dni_types', $dni_types)->with('cities', $cities);
            //->with('next_history_clinic', $next_history_clinic);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInternmentPatientRequest $request)
    {
        $patient = PatientController::storeInternmentPatientInternment($request);
        $next_order = Internment::getNextOrder();     
        $internment = new Internment;    
        $internment->order = $next_order;        
        $internment->patient()->associate($patient);
        $internment->save();

        $dni_types = DniType::get();
        $cities = City::get();
        $relationships =  Relationship::get();
        //dd($internment);
        return view('internments.createWitness')->with('isMinor', $patient->age <= '18')->with('dni_types', $dni_types)->with('cities', $cities)->with('relationships', $relationships)->with('internment_id',$internment->id)->with('testigo_1', false)->with('testigo_2', false);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public static function witness(StoreWitnessRequest $request){
        //dd($request);
        //Save Witness y me devuelve el Objeto Witness
        $witness = WitnessController::store($request);
        $dni_types = DniType::get();
        $cities = City::get();
        $relationships =  Relationship::get();

        if ($request->responsible) {
            //Si es Menor.
            return view('internments.createWitness')->with('isMinor', false)->with('dni_types', $dni_types)->with('cities', $cities)->with('relationships', $relationships)->with('internment_id', $request->internment_id)->with('testigo_1', true)->with('testigo_2', false);

        } else {
            
            if ( !$request->testigo_1 ){
                //No es Menor, Es Testigo_1  por lo tanto paso a Testigo_2 y termino.
                return view('internments.createWitness')->with('isMinor', false)->with('dni_types', $dni_types)->with('cities', $cities)->with('relationships', $relationships)->with('internment_id', $request->internment_id)->with('testigo_1', true)->with('testigo_2', true);
            
            } else {
                
                //No es menor, y es Testigo 1
                if ($request->testigo_1 && !$request->testigo_2){
                    return view('internments.createWitness')->with('isMinor', false)->with('dni_types', $dni_types)->with('cities', $cities)->with('relationships', $relationships)->with('internment_id', $request->internment_id)->with('testigo_1', true)->with('testigo_2', true);
                
                } else {
                    //Es testigo 2 ó 1 pero , por lo tanto pasa a la siguiente vista. Cargar Diagnostico, Médico, Habitación.
                    $internment = Internment::findOrFail($request->internment_id);

                    return view('internments.complete')->with('internment', $internment);
                }
            }
        }

    }

    public function confirm(StoreInternmentConfirmRequest $request){
        $internment = Internment::findOrFail($request->internment_id);
        $internment->initial_date = Carbon::now();
        $internment->save();
        Flash::success(trans('Internación Completada con éxito!'));
        return redirect()->route('internments.index');        
    }

    public static function getInternment($id){
        $internment = Internment::findOrFail($id);    
        return $internment;
    }


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
        //Trae la internacion con la relación Medics completa.
        $internment = Internment::findOrFail($id);
        //dd($internment);

        //Retorna el ID del Medico y del Psicologo.
        $internmentMedicId = $internment->lastMedicInternment();
        $internmentPsychologistId = $internment->lastPsychologistInternment();
        //dd($internmentPsychologistId);
        //dd($internmentMedicId);
        
        //Devuelve el listado de Médicos y Psicologos
        $medics = Medic::getMedics();
        //dd($medics);
        $psychologists = Medic::getPsychologists();
        
        $discharge_types = DischargeType::get();
        //dd($discharge_types);
        return view('internments.edit')->with('internment', $internment)->with('medics', $medics)->with('psychologists', $psychologists)->with('internmentMedicId', $internmentMedicId)->with('internmentPsychologistId', $internmentPsychologistId)->with('discharge_types',$discharge_types);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInternmentPatientRequest $request, $id)
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
        $internment = Internment::findOrFail($id);
        $internment->delete();

        return trans('internment.internment_deleted');
    }
}
