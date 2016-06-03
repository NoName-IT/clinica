<?php

use Illuminate\Database\Seeder;

class InternmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        //factory(App\Internment::class, 200)->create();

        $faker = Faker\Factory::create();

        $patients = App\Patient::select('id')->get();

        $i=1;
        foreach ($patients as $patient) {
            # code...
            $array_patients[$i] = $patient['id'];

            factory(App\Internment::class)->create([

                        'patient_id'      => $patient['id'],

                    ]);
             
             $i++;

        }

        $internments = App\Internment::select('id')->get();

        $i=1;
        foreach ($internments as $internment) {
            # code...
            $array_internments[$i] = $internment['id'];
            $i++;

        }
        
        for ($i=0; $i < 20; $i++) { 
            # code...
            //$id = $faker->unique()->randomElement($array_internments);

            $id = $faker->unique()->randomElement($array_patients);

            //echo $id;

            $my_internment = App\Internment::where('patient_id', $id)
                                        ->first();
            //dd($my_internment);

            $initial_date = $my_internment->initial_date;
            $final_date = date('Y-m-d H:i:s', strtotime($initial_date. " + ".$faker->numberBetween(50,100)." days"))."\n";

            $my_internment->final_date = $final_date;

            $my_internment->save();

            factory(App\Internment::class)->create([

                        'patient_id'      => $id,
                        'initial_date'      => date('Y-m-d H:i:s', strtotime($final_date. " + ".$faker->numberBetween(50,100)." days"))."\n",

                    ]);
             
             $i++;

        }

    }
}
