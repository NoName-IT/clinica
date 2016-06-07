<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name',50);
            $table->string('last_name',50);
            $table->date('birth_date');
            $table->integer('birth_town');
            $table->time('birth_time');
            $table->boolean('civil_status');
            $table->integer('dni_type');
            $table->integer('dni');
            $table->string('street_address',150);
            $table->integer('town');
            $table->string('phone',50);
            $table->integer('blood_type');
            $table->boolean('dni_copy');
            $table->boolean('medical_insurance_copy');
            $table->boolean('status');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('patients');
    }
}
