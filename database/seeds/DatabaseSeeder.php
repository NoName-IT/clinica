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
        $this->call(CivilStatusesTableSeeder::class);
        $this->call(BloodTypesTableSeeder::class);
        $this->call(DniTypesTableSeeder::class);
        $this->call(PatientsTableSeeder::class);
        $this->call(MedicalsInsurancesTableSeeder::class);
        $this->call(CoinsurancesTableSeeder::class);
        $this->call(PaychecksTableSeeder::class);
        $this->call(InternmentsTableSeeder::class);
        $this->call(RelationshipsTableSeeder::class);
        $this->call(WitnessesTableSeeder::class);
        $this->call(MedicTypesTableSeeder::class);
        $this->call(MedicsTableSeeder::class);
        $this->call(ProvincesTableSeeder::class);
        $this->call(DepartmentsTableSeeder::class);
        $this->call(CitiesTableSeeder::class);

    }
}
