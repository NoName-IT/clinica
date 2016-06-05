<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Patient;
use App\MedicalInsurance;
use App\Coinsurance;
use App\Paycheck;
use App\Internment;
use Carbon\Carbon;
use DB;
use Response;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        //$patient = Patient::where('id',5)->get();
        //$patient2 = Patient::find(5);

        //dd($patient[0]->insurances);
        //dd($patient2);

        //$medical = MedicalInsurance::find(1);
        /*
        foreach ($medical as $medic) {
            echo $medic->patients;
        }
        */
        //dd($patient->insurances);
        //dd($medical->patients);

        //$now = new DateTime();
        //echo $now->format('Y-m-d H:i:s');    // MySQL datetime format
        //echo $now->getTimestamp();
        //echo Carbon::now();

        // los pacientes menores de edad
        $patients = Patient::whereDate('birth_date', '>=', Carbon::now()->subYears(18))->get();

        /*
        foreach ($patients as $patient) {
            # code...
            //dd($patient->internments[0]->id);
            echo $patient->internments[0]->id;
        }
        */
        //dd($patients);

        //$patient_internment = Internment::where('patient_id',5)->get();
        $patient_internment = Internment::get();


        //dd($patient_internment[10]->medics);

        //dd($patients->internments);
        //dd($patients[0]);
        //dd($patients[0]->full_name);
        //$patients = Patient::find(5);
        $paychecks = Paycheck::where('patient_id',5)->get();

        //dd($paychecks);
        //dd($patients->paychecks);

        //$coinsurance = Coinsurance::find(1);

        //dd($patient->coinsurances);
        /*
        foreach ($patient->medical_insurances as $medical_insurance) {
            # code...
            echo $medical_insurance->pivot->initial_date;
            //echo $medical_insurance;
        }
        */

        //dd($coinsurance->medical_insurances);

        //dd($coinsurance->patients);

        /*

        foreach ($patients as $patient) {
            # code...

            echo 'ID: '.$patient->id."<br>";
            echo 'Nombre: '.$patient->first_name.' '.$patient->last_name."<br>";

            if (!empty($patient->medical_insurances[0])) {
                # code...
                echo 'Obra Social: '.$patient->medical_insurances[0]->name."<br>";

            }

            if (!empty($patient->coinsurances[0])) {
                # code...
                echo 'Coseguro: '.$patient->coinsurances[0]->name."<br>";

            }


            echo "<br>";

            //echo 'Obra Social: '.$patient->medical_insurances."\n";
            //echo 'Coseguro: '.$patient->coinsurances."\n\n";
        }
        */
        //dd($patients);

        //$medicals = MedicalInsurance::distinct()->select('name')->get();
        //$medicals = MedicalInsurance::with('patients')->groupBy('name')->get();
        /*
        $medicals = DB::table('medical_insurances')
            ->leftJoin('medical_insurance_patient', 'medical_insurances.id', '=', 'medical_insurance_patient.medical_insurance_id')
            ->select('name')
            ->get();

        */
        /*
        $medicals =  DB::table(
            DB::table('medical_insurances')
            ->leftJoin('medical_insurance_patient', 'medical_insurances.id', '=', 'medical_insurance_patient.medical_insurance_id')
            ->select('name')
            ->get()
            )->select('name', DB::raw('COUNT(name) as count'))->get();

        */

        //dd($ppc);
        //dd($ppmi);

        //$patients = Patient::whereDate('birth_date', '>=', Carbon::now()->subYears(18))->get();

        $internments = Internment::select('initial_date')->whereDate('initial_date', '>=', Carbon::now()->subYears(6))->get();

        $temptable = DB::raw("(select *, YEAR(initial_date) as year from internments) as temp");

        $internments = DB::table('patients')
                        //->select('temp.year', DB::raw('COUNT(year) as value'))
                        ->select('*', DB::raw('FLOOR(DATEDIFF(initial_date, birth_date)/365) as age'))
                        ->leftJoin($temptable, 'temp.patient_id', '=', 'patients.id')
                        //->groupBy('temp.year')
                        ->whereDate('initial_date', '>=', Carbon::now()->subYears(6))
                        ->get();

        //dd($internments);
 
        //DB::raw('COUNT(year) as value')
        /*

        $query = DB::table('internments')
            ->select(DB::raw('YEAR(initial_date) as year'))
            ->whereDate('initial_date', '>=', Carbon::now()->subYears(6));

        $internments = $query->select(DB::raw('COUNT(year) as value'))->get();
        */
        /*
        $query = DB::table('internments')
            ->select(DB::raw('COUNT(year) as value'));
        
        */

        //echo $query;
        //dd($query);
        /*
        $internments = DB::table('internments')
            ->select(DB::raw('YEAR(initial_date) as year'))
            ->whereDate('initial_date', '>=', Carbon::now()->subYears(6))
            ->get();
        */

        //$internments = DB::select(DB::raw('select * from internments'));

        /*
        $internments = DB::table('internments')
            ->select(DB::raw('YEAR(initial_date) as year'))
            ->whereDate('initial_date', '>=', Carbon::now()->subYears(6))
            ->get();
        */

       
        //dd($ppmi);
        //dd($internments);

        
        
        if($request->ajax()){

            // Cantidad de pacientes por obras sociales
            $ppmi = DB::table('medical_insurances')
            ->leftJoin('medical_insurance_patient', 'medical_insurances.id', '=', 'medical_insurance_patient.medical_insurance_id')
            ->select('name as label', DB::raw('COUNT(name) as value'))
            ->groupBy('name')
            ->get();

            $ppc = DB::table('coinsurances')
            ->leftJoin('coinsurance_patient', 'coinsurances.id', '=', 'coinsurance_patient.coinsurance_id')
            ->select('name as label', DB::raw('COUNT(name) as value'))
            ->groupBy('name')
            ->get();

            $temptable = DB::raw("(select id, YEAR(initial_date) as year from internments) as temp");

            $ppy = DB::table('internments')
                        ->select('temp.year', DB::raw('COUNT(year) as value'))
                        ->leftJoin($temptable, 'temp.id', '=', 'internments.id')
                        ->groupBy('temp.year')
                        ->whereDate('initial_date', '>=', Carbon::now()->subYears(6))
                        ->get();
        
            return Response::json(array(
                    'success'   => true,
                    'graph1'    => $ppmi,
                    'graph2'    => $ppc,
                    'graph3'    => $ppy
                )); 


        }

        return view('home');
    }
}
