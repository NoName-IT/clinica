<?php

use Illuminate\Database\Seeder;

class MedicTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $names = array('Medico', 'Psicologo');

        foreach ($names as $name) {
        	# code...
        	factory(App\MedicType::class)->create([

                        'name'      => $name,
                    ]);
        }
    }
}
