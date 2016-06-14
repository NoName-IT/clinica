<?php

use Illuminate\Database\Seeder;

class BloodTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $blood_types = array ('0+', '0-', 'B+', 'B-', 'A+', 'A-', 'AB+', 'AB-');

        foreach ($blood_types as $blood_type) {
            # code...
            factory(App\BloodType::class)->create([

                        'name'      => $blood_type,
                    ]);
        }

    }
}
