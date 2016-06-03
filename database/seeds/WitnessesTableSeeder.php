<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class WitnessesTableSeeder extends Seeder
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

        $relationships = App\Relationship::select('id')->get();

        $i=1;
        foreach ($relationships as $relationship) {
            # code...
            $array_relationships[$i] = $relationship['id'];

            $i++;

        }

        //dd($array_relationships);

        $internments = App\Internment::select('id')->get();

        $i=1;
        foreach ($internments as $internment) {
            # code...
            $array_internments[$i] = $internment['id'];
            $my_relationship = $faker->randomElement($array_relationships);

            factory(App\Witness::class)->create([

                        'internment_id'      => $internment['id'],
                        'relationship_id'      => $my_relationship,

                    ]);
             
            $i++;

        }


        for ($i=0; $i < 30; $i++) { 
            # code...
            //$id = $faker->unique()->randomElement($array_internments);

            $my_relationship = $faker->randomElement($array_relationships);
            $my_internment = $faker->randomElement($array_internments);

            factory(App\Witness::class)->create([

                        'internment_id'      => $my_internment,
                        'relationship_id'      => $my_relationship,

                    ]);
             
             $i++;

        }

        $patients = App\Patient::whereDate('birth_date', '>=', Carbon::now()->subYears(18))->get();

        foreach ($patients as $patient) {
        	# code...
        	//echo $patient->internments;

        	$my_relationship = $faker->randomElement($array_relationships);

        	factory(App\Witness::class)->create([

                        'internment_id'      => $patient->internments[0]->id,
                        'relationship_id'      => $my_relationship,
                        'responsible'       => true,

                    ]);
        }



    }
}
