<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPropertyDescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_property_descriptions', function (Blueprint $table) {
            $table->id('property_description_id');
            $table->foreignId('fk_county_id');
            $table->text('description_text');
            $table->text('location');
            $table->integer('bedrooms');
            $table->integer('bathrooms');
            $table->text('type');
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
        Schema::dropIfExists('tbl_property_descriptions');
    }
}
