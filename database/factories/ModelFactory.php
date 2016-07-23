<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Patient::class, function (Faker\Generator $faker) {
    return [
        'first_name'        => $faker->firstName,
        'last_name'         => $faker->lastName,
        'birth_date'        => $faker->date,
        'birth_town'        => $faker->randomElement($array = array (1,2,3,4,5,6,7,8,9,10,11,12)),
        'birth_time'        => $faker->time,
        'civil_status_id'      => $faker->randomElement($array = array (1,2)),
        'dni_type_id'          => $faker->randomElement($array = array (1,2,3,4)),
        'dni'               => $faker->numberBetween(9500000,45000000),
        'street_address'    => $faker->streetAddress,
        'town'              => $faker->randomElement($array = array (1,2,3,4,5,6,7,8,9,10,11,12)),
        'phone'             => $faker->e164PhoneNumber,
        'blood_type_id'        => $faker->randomElement($array = array (1,2,3,4,5,6)),
        'dni_copy'          => $faker->boolean,
        'medical_insurance_copy' => $faker->boolean,
        'status' => $faker->boolean,
    ];
});


$factory->define(App\Coinsurance::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->unique()->domainWord,
        'available_days' => $faker->numberBetween(10,150),
        'renovation_days' => $faker->numberBetween(10,300),
        'price_per_day' => $faker->randomFloat,
        'price_per_day' => $faker->randomFloat,
        'coverage' => $faker->randomFloat,
        'iva' => 21,

    ];
});


$factory->define(App\MedicalInsurance::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->unique()->countryCode,
        'available_days' => $faker->numberBetween(10,150),
        'renovation_days' => $faker->numberBetween(10,300),
        'price_per_day' => $faker->randomFloat,
        'price_per_day' => $faker->randomFloat,
        'coverage' => $faker->randomFloat,
        'iva' => 21,
    ];
});

$factory->define(App\MedicalInsurancePatient::class, function (Faker\Generator $faker) {

    return [
        'initial_date' => $faker->dateTimeThisYear,
        'affiliate_number' => $faker->unique()->numberBetween(12222858,42222858),         
    ];
});

$factory->define(App\CoinsurancePatient::class, function (Faker\Generator $faker) {

    return [
        'initial_date' => $faker->dateTimeThisYear,
        'affiliate_number' => $faker->unique()->numberBetween(52222858,92222858), 
    ];
});

$factory->define(App\Paycheck::class, function (Faker\Generator $faker) {

    return [
        'january' => $faker->boolean(95),
        'february' => $faker->boolean(95),
        'march' => $faker->boolean(95),
        'april' => $faker->boolean(95),
        'may' => $faker->boolean(95),
        'june' => $faker->boolean(95),
        'july' => $faker->boolean(95),
        'august' => $faker->boolean(95),
        'september' => $faker->boolean(95),
        'october' => $faker->boolean(95),
        'november' => $faker->boolean(95),
        'december' => $faker->boolean(95),
 
    ];
});

$factory->define(App\Internment::class, function (Faker\Generator $faker) {

    return [
        'diagnostic' => $faker->catchPhrase,
        'room' => $faker->numberBetween(1,100),
        'clinic_history' => $faker->unique()->numberBetween(25345,60123),
        //'initial_date' => $faker->dateTimeThisYear,
        'initial_date' => $faker->dateTimeThisDecade,
        //'final_date' => date('Y-m-d H:i:s', strtotime($initial_date. " + ".$faker->numberBetween(50,100)." days"))."\n",

    ];
});

$factory->define(App\Relationship::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->word,
    ];
});

$factory->define(App\Witness::class, function (Faker\Generator $faker) {
    return [
        'first_name'        => $faker->firstName,
        'last_name'         => $faker->lastName,
        'dni_type'          => $faker->randomElement($array = array (1,2,3,4)),
        'dni'               => $faker->numberBetween(9500000,45000000),
        'street_address'    => $faker->streetAddress,
        'phone'             => $faker->e164PhoneNumber,
        'age'               => $faker->numberBetween(13,70),
        'responsible'       => false,
    ];
});

$factory->define(App\MedicType::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->word,
    ];
});

$factory->define(App\Medic::class, function (Faker\Generator $faker) {
    return [
        'first_name'        => $faker->firstName,
        'last_name'         => $faker->lastName,
        'cuit'              => $faker->numberBetween(1010000010,2010000020),
        'dni'               => $faker->numberBetween(9500000,45000000),
        'license'           => $faker->numberBetween(111111,9999999),
        'street_address'    => $faker->streetAddress,
        'blood_type_id'        => $faker->randomElement($array = array (1,2,3,4,5,6)),

    ];
});

$factory->define(App\Province::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
    ];
});

$factory->define(App\Department::class, function (Faker\Generator $faker) {
    return [
        'province_id' => $faker->numberBetween(000,222),
        'name' => $faker->name        
    ];
});
$factory->define(App\City::class, function (Faker\Generator $faker) {
    return [
        'department_id' => $faker->numberBetween(000,222),
        'name' => $faker->name,
    ];
});

$factory->define(App\CivilStatus::class, function (Faker\Generator $faker) {
    return [
        'name'        => $faker->unique()->randomElement($array = array ('soltero', 'casado')),
    ];
});

$factory->define(App\BloodType::class, function (Faker\Generator $faker) {
    return [
        'name'        => $faker->unique()->randomElement($array = array ('+0', '-0', '+B', '-B', '+A', '-A', '+AB', '-AB')),
    ];
});

$factory->define(App\DniType::class, function (Faker\Generator $faker) {
    return [
        'name'        => $faker->unique()->randomElement($array = array ('DNI', 'LE', 'LC', 'LD')),

    ];
});

$factory->define(App\DischargeType::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->unique()->randomElement($array = array ('Alta Médica', 'Contra Opinión', 'Derivado', 'Óbito', 'Fuga')),

    ];
});
