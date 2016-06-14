<?php

use Illuminate\Database\Seeder;

class DniTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $dni_types = array ('DNI', 'LE', 'LC', 'LD');

        foreach ($dni_types as $dni_type) {
        	# code...
        	factory(App\DniType::class)->create([

                        'name'      => $dni_type,
                    ]);
        }

    }
}
