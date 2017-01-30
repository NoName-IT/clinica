<?php

use Illuminate\Database\Seeder;

class DischargeTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $discharge_types = array ('Alta Médica', 'Contra Opinión', 'Derivado', 'Óbito', 'Fuga');

        foreach ($discharge_types as $discharge_type) {
        	# code...
        	factory(App\DischargeType::class)->create([

                        'name'      => $discharge_type,
                    ]);
        }

    }
}
