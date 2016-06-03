<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicalInsurancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_insurances', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',100);
            $table->string('affiliate_type',50);
            $table->string('module',50);
            $table->integer('available_days');
            $table->integer('renovation_days');
            $table->decimal('price_per_day', 7, 2);
            $table->decimal('coverage', 5, 2);
            $table->decimal('iva', 7, 2);
            $table->timestamps();
        });

        Schema::create('medical_insurance_patient', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('patient_id')->unsigned();
            $table->integer('medical_insurance_id')->unsigned();

            $table->dateTime('initial_date');
            $table->dateTime('final_date');
            $table->timestamps();

            $table->foreign('patient_id')->references('id')->on('patients');
            $table->foreign('medical_insurance_id')->references('id')->on('medical_insurances');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('medical_insurance_patient');
        Schema::drop('medical_insurances');
    }
}
