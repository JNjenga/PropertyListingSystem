<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
         Schema::create('Profile', function (Blueprint $table) {
            $table->bigIncrements("admin_id");//Confirm
             $table->string('email')->unique();
             $table->string('password');
            $table->time("last login");//Confirm variable type
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    Schema::dropIfExists('Profile');

    }
}
