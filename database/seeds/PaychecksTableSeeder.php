<?php

use Illuminate\Database\Seeder;

class PaychecksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $faker = Faker\Factory::create();

      	$patients = App\Patient::select('id')->get();

        $i=1;
        foreach ($patients as $patient) {
        	# code...
        	$array_patients[$i] = $patient['id'];
        	$i++;

        }

        $dates = array(2015, 2016);

        foreach ($array_patients as $patient) {
        	# code...
        	foreach ($dates as $date) {
        		# code...
        		factory(App\Paycheck::class)->create([
            		'patient_id' => $patient,
      		        'year' => $date,
       		
        		]);
        	}
        }

    }
}
