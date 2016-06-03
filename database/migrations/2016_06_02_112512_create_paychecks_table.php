<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaychecksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paychecks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('patient_id')->unsigned();
            $table->integer('year');
            $table->boolean('january');
            $table->boolean('february');
            $table->boolean('march');
            $table->boolean('april');
            $table->boolean('may');
            $table->boolean('june');
            $table->boolean('july');
            $table->boolean('august');
            $table->boolean('september');
            $table->boolean('october');
            $table->boolean('november');
            $table->boolean('december');
            $table->timestamps();

            $table->foreign('patient_id')->references('id')->on('patients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('paychecks');
    }
}
