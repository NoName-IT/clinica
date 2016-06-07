<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWitnessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('witnesses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('internment_id')->unsigned();
            $table->integer('relationship_id')->unsigned();

            $table->string('first_name',50);
            $table->string('last_name',50);
            $table->integer('dni_type');
            $table->integer('dni');
            $table->integer('age');
            $table->string('street_address',150);
            $table->string('phone',50);
            $table->boolean('responsible');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('internment_id')->references('id')->on('internments');
            $table->foreign('relationship_id')->references('id')->on('relationships');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('witnesses');
    }
}
