<?php

use Illuminate\Database\Seeder;

class MedicsTableSeeder extends Seeder
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

        $medic_types = App\MedicType::select('id')->get();

        $i=1;
        foreach ($medic_types as $medic_type) {
            # code...
            $array_medic_types[$i] = $medic_type['id'];
            $i++;

        }

        for ($i=0; $i < 30; $i++) { 
        	# code...

        	factory(App\Medic::class)->create([

                        'medic_type_id'      => $faker->randomElement($array_medic_types),

                    ]);
        }

        $medics = App\Medic::select('id')->get();

        $i=1;
        foreach ($medics as $medic) {
            # code...
            $array_medic[$i] = $medic['id'];
            $i++;

        }

        $internments = App\Internment::get();

        foreach ($internments as $internment) {
        	# code...
        	$internment->medics()->attach($faker->randomElement($array_medic_types));
        }

        
    }
}
