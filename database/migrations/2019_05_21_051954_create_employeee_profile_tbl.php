<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeeProfileTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emp_profile_tbl', function (Blueprint $table) {
            $table->increments('profile_id');
            $table->integer('user_id');
            $table->string('image');
            $table->string('fullname');
            $table->string('email');
            $table->string('contact');
            $table->string('age');
            $table->string('gender');
            $table->string('birthdate');
            $table->string('address');
            $table->string('course');
            $table->string('college');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emp_profile_tbl');
    }
}
