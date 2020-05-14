<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesandInvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
         Schema::create('Sales and Invoice', function (Blueprint $table) {
             $table->bigIncrements("property_id");
              $table->unsignedBigInteger('sales_id');          
              $table->integer('property value');
              $table->integer('commision');
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Sales and Invoice');
    }
}
