<?php

use Illuminate\Database\Seeder;

class PatientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        //DB::table('patients')->truncate();

        factory(App\Patient::class, 170)->create();
    }
}
