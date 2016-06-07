<?php

use Illuminate\Database\Seeder;
use App\Patient;
use App\MedicalInsurance;

class MedicalsInsurancesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
       	//factory(App\MedicalInsurance::class, 5)->create();

        $faker = Faker\Factory::create();

        $names = array('IOMA', 'OSDE', 'Accord', 'Swiss Medical');
        $affiliate_types = array('Obligario', 'Voluntario', 'Prepago');
        $modules = array('Cronico', 'Dual', 'Agudo');

        foreach ($names as $name) {        

            foreach ($affiliate_types as $affiliate_type) {

                foreach ($modules as $module) {

                    factory(App\MedicalInsurance::class)->create([

                        'name'      => $name,
                        'affiliate_type'        => $affiliate_type,
                        'module'        => $module,

                    ]);
                }
            }
        }

       	$patients = Patient::select('id')->get();
        $medical_insurances = MedicalInsurance::select('id')->get();

        $i=1;
        foreach ($patients as $patient) {
        	# code...
        	$array_patients[$i] = $patient['id'];
        	$i++;

        }

        $i=1;
        foreach ($medical_insurances as $medical_insurance) {
        	# code...
        	$array_medical_insurances[$i] = $medical_insurance['id'];
        	$i++;

        }

        $i=1;
        for ($i = 1; $i <= 1300; $i++) {
        	
            factory(App\MedicalInsurancePatient::class)->create([
            		'patient_id' => $faker->unique()->randomElement($array_patients), 
                	'medical_insurance_id' => $faker->randomElement($array_medical_insurances),
        		
        	]);

        }

        $patients = App\MedicalInsurancePatient::select('patient_id')->get();
        $i=1;
        foreach ($patients as $patient) {
            # code...
            $array_patients2[$i] = $patient['patient_id'];
            $i++;

        }

        $i=1;
        for ($i = 1; $i <= 20; $i++) {
            
            $id = $faker->unique()->randomElement($array_patients2);

            $my_patient = App\MedicalInsurancePatient::where('patient_id', $id)
                                        ->first();

            $initial_date = $my_patient->initial_date;
            $final_date = date('Y-m-d H:i:s', strtotime($initial_date. " + ".$faker->numberBetween(50,100)." days"))."\n";

            $my_patient->final_date = $final_date;

            $my_patient->save();

            factory(App\MedicalInsurancePatient::class)->create([
                    'patient_id' => $id, 
                    'medical_insurance_id' => $faker->randomElement($array_medical_insurances),
                    'initial_date' =>   $final_date,
                
            ]);

        }

    }
}
