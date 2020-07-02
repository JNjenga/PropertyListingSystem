<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToTblMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_messages', function (Blueprint $table) {
            $table->foreign('property_id', 'tbl_messages_property_foreign')->references('property_id')->on('tbl_properties')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('user_id', 'tbl_messages_user_foreign')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_messages', function (Blueprint $table) {
            $table->dropForeign('tbl_messages_property_foreign');
            $table->dropForeign('tbl_messages_user_foreign');
        });
    }
}
