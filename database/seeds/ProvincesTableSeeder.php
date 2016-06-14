<?php

use Illuminate\Database\Seeder;

class ProvincesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

  	$provinces = array(
				'BUENOS AIRES',
				'CATAMARCA',
				'CHACO',
				'CHUBUT',
				'CORDOBA',
				'CORRIENTES',
				'ENTRE RIOS',
				'FORMOSA',
				'JUJUY',
				'LA PAMPA',
				'LA RIOJA',
				'MENDOZA',
				'MISIONES',
				'NEUQUEN',
				'RIO NEGRO',
				'SALTA',
				'SAN JUAN',
				'SAN LUIS',
				'SANTA CRUZ',
				'SANTA FE',
				'SANTIAGO DEL ESTERO',
				'TIERRA DEL FUEGO',
				'TUCUMAN'
			);

        foreach ($provinces as $province) {
        	# code...
        	factory(App\Province::class)->create([
                        'name'      => $province,
                    ]);
        }

    }
}
