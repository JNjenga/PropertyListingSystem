<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblProperties extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_properties', function (Blueprint $table) {
            $table->bigIncrements('property_id');
            $table->string('title', 50);
            $table->tinyInteger('status');
            $table->decimal('price', 8, 2);
            $table->longText('description');
            $table->unsignedTinyInteger('bedrooms')->nullable();
            $table->unsignedTinyInteger('bathrooms')->nullable();
            $table->string('type', 50);
            $table->unsignedBigInteger('fk_property_category_id');
            $table->foreign('fk_property_category_id')->references('property_category_id')->on('tbl_property_categories')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->unsignedBigInteger('fk_county_id');
            $table->foreign('fk_county_id', )->references('county_id')->on('tbl_counties')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->unsignedBigInteger('fk_user_id');
            $table->foreign('fk_user_id', )->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->string('location', 50);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_properties');
    }
}
