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
    public function index()
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

        foreach ($patients as $patient) {
            # code...
            //dd($patient->internments[0]->id);
            echo $patient->internments[0]->id;
        }

        //dd($patients);

        //$patient_internment = Internment::where('patient_id',5)->get();
        $patient_internment = Internment::get();


        dd($patient_internment[10]->medics);

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

        dd($patients);


        return view('home');
    }
}
