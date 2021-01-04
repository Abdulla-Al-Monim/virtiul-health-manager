<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnregisterUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unregister_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('phone');
            $table->string('email')->unique();;
            $table->string('address');
            $table->integer('gender')->default(0);
            $table->string('password');
            $table->string('user_type')->default('PATIENT')->comment('USER for Patient and ADMIN for admin DOCTOR for DOCTOR');
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
        Schema::dropIfExists('unregister_users');
    }
}
