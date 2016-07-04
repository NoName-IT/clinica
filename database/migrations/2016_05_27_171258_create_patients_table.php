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
            $table->integer('civil_status_id')->unsigned();
            $table->integer('dni_type_id')->unsigned();
            $table->integer('dni');
            $table->string('street_address',150);
            $table->integer('town');
            $table->string('phone',50);
            $table->integer('blood_type_id')->unsigned();;
            $table->boolean('dni_copy')->default(false);
            $table->boolean('medical_insurance_copy')->default(false);
            $table->boolean('status');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('civil_status_id')->references('id')->on('civil_statuses');
            $table->foreign('blood_type_id')->references('id')->on('blood_types');
            $table->foreign('dni_type_id')->references('id')->on('dni_types');
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
