<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(PatientsTableSeeder::class);
        $this->call(MedicalsInsurancesTableSeeder::class);
        $this->call(CoinsurancesTableSeeder::class);
        $this->call(PaychecksTableSeeder::class);
        $this->call(InternmentsTableSeeder::class);
        $this->call(RelationshipsTableSeeder::class);
        $this->call(WitnessesTableSeeder::class);
    }
}
