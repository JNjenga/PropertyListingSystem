<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblBlogPostTable extends Migration
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
            $table->string('blog_post_title', 72);
            $table->text('blog_post_body');
            $table->unsignedInteger('fk_blog_cateogory_id');//->index('tbl_blog_post_fk_category_blog_id_foreign');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            $table->tinyInteger('publish')->default(1);
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
