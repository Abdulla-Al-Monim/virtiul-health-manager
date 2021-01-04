<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('doctor_id');
            $table->string('doctor_name')->nullable();
            $table->string('doctor_phone')->nullable();
            $table->string('doctor_email')->nullable();
            $table->integer('patient_id');
            $table->string('pattient_name')->nullable();
            $table->string('pattient_phone')->nullable();
            $table->string('pattient_email')->nullable();
            $table->string('pattient_problem')->nullable();
            $table->string('Test_name')->nullable();
            $table->string('Test_report')->nullable();
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
        Schema::dropIfExists('tests');
    }
}
