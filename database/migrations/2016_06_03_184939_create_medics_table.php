<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medics', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name',50);
            $table->string('last_name',50);
            $table->integer('medic_type_id')->unsigned();
            $table->string('cuit');
            $table->string('dni');
            $table->string('license');
            $table->string('street_address',150);
            $table->integer('blood_type_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('medic_type_id')->references('id')->on('medic_types');
            $table->foreign('blood_type_id')->references('id')->on('blood_types');

        });

        Schema::create('internment_medic', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('internment_id')->unsigned();
            $table->integer('medic_id')->unsigned();
            
            $table->foreign('internment_id')->references('id')->on('internments');
            $table->foreign('medic_id')->references('id')->on('medics');

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
        Schema::drop('internment_medic');
        Schema::drop('medics');
    }
}
