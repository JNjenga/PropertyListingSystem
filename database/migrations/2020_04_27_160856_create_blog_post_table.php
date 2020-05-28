<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_blog_post', function (Blueprint $table) {
            $table->bigIncrements('blog_post_id');
	    $table->string('blog_post_title', 150);
	    $table->longText('blog_post_body');
	    $table->unsignedBigInteger('fk_category_id');
            $table->dateTime('created_at', 0)->useCurrent();
            $table->dateTime('updated_at', 0)->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_blog_post');
    }
}
