<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appoint_doctors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('doctor_id');
            $table->string('doctor_name');
            $table->integer('patient_id');
            $table->string('patient_name');
            $table->integer('status')->default(0);
            $table->integer('transaction_type')->nullable();
            $table->string('transaction_number')->nullable();
            $table->string('transaction_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appoint_doctors');
    }
}
