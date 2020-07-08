<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_messages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('property_id'); //->index('tbl_messages_property_foreign');
            $table->string('customer_email', 50);
            $table->text('message');
            $table->boolean('seen')->default(0);
            $table->boolean('read')->default(0);
            $table->unsignedBigInteger('user_id'); // ->index('tbl_messages_user_foreign');
 
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
        Schema::dropIfExists('tbl_messages');
    }
}
