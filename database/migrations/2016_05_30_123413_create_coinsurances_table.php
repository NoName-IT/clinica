<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoinsurancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coinsurances', function (Blueprint $table) {
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
            $table->softDeletes();
        });

        Schema::create('coinsurance_patient', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('patient_id')->unsigned();
            $table->integer('coinsurance_id')->unsigned();

            $table->string('affiliate_number',50);             

            $table->dateTime('initial_date');
            $table->dateTime('final_date');
            
            $table->foreign('patient_id')->references('id')->on('patients');
            $table->foreign('coinsurance_id')->references('id')->on('coinsurances');

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
        Schema::drop('coinsurance_patient');
        Schema::drop('coinsurances');
    }
}
