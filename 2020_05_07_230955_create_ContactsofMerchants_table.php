<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsofMerchantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('Contacts of merchants', function (Blueprint $table) {
            $table->bigIncrements("merchant_id");
             $table->string('merchant_surname');
             $table->string('email')->unique();
              $table->integer('phone numbers');
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Contacts of merchants');
    }
}
