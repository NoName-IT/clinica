<?php

use Illuminate\Database\Seeder;

class RelationshipsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $names = array('Esposo', 'Esposa', 'Padre', 'Hermano', 'Tutor');

        foreach ($names as $name) {
        	# code...
        	factory(App\Relationship::class)->create([

                        'name'      => $name,
                    ]);
        }
    }
}
