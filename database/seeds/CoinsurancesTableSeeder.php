<?php

use Illuminate\Database\Seeder;
use App\Patient;
use App\Coinsurance;

class CoinsurancesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        //factory(App\Coinsurance::class, 10)->create();
        $faker = Faker\Factory::create();

        $names = array('UPCN', 'OCAC', 'ATE', 'OSPRERA');
        $affiliate_types = array('Obligario', 'Voluntario', 'Prepago');
        $modules = array('Cronico', 'Dual', 'Agudo');

        foreach ($names as $name) {        

            foreach ($affiliate_types as $affiliate_type) {

                foreach ($modules as $module) {

                    factory(App\Coinsurance::class)->create([

                        'name'      => $name,
                        'affiliate_type'        => $affiliate_type,
                        'module'        => $module,

                    ]);
                }
            }
        }

        $patients = App\MedicalInsurancePatient::select('patient_id as id')->get();
        $coinsurances = Coinsurance::select('id')->get();

        $i=1;
        foreach ($patients as $patient) {
            # code...
            $array_patients[$i] = $patient['id'];
            $i++;

        }

        $i=1;
        foreach ($coinsurances as $coinsurance) {
            # code...
            $array_coinsurances[$i] = $coinsurance['id'];
            $i++;

        }

        for ($i = 1; $i <= 1000; $i++) {
            
            factory(App\CoinsurancePatient::class)->create([
                    'patient_id' => $faker->unique()->randomElement($array_patients), 
                    'coinsurance_id' => $faker->randomElement($array_coinsurances),
                
            ]);

        }

        $patients = App\CoinsurancePatient::select('patient_id')->get();
        $i=1;
        foreach ($patients as $patient) {
            # code...
            $array_patients2[$i] = $patient['patient_id'];
            $i++;

        }

        $i=1;
        for ($i = 1; $i <= 10; $i++) {
            
            $id = $faker->unique()->randomElement($array_patients2);

            $my_patient = App\CoinsurancePatient::where('patient_id', $id)
                                        ->first();

            $initial_date = $my_patient->initial_date;
            $final_date = date('Y-m-d H:i:s', strtotime($initial_date. " + ".$faker->numberBetween(50,100)." days"))."\n";

            $my_patient->final_date = $final_date;

            $my_patient->save();

            factory(App\CoinsurancePatient::class)->create([
                    'patient_id' => $id, 
                    'coinsurance_id' => $faker->randomElement($array_coinsurances),
                    'initial_date' =>   $final_date,
                
            ]);

        }



    }
}
