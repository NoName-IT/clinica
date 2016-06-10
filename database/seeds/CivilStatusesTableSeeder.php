<?php

use Illuminate\Database\Seeder;

class CivilStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $civil_statuses = array ('Soltero', 'Casado');

        foreach ($civil_statuses as $civil_status) {
            # code...
            factory(App\CivilStatus::class)->create([

                        'name'      => $civil_status,
                    ]);
        }

    }
}
