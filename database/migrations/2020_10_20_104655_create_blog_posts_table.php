<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('category_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();

            $table->string('slug')->unique();
            $table->string('title');

            $table->string('excerpt')->nullable();

            $table->longText('content_raw');
            $table->longText('content_html');

            $table->boolean('is_published');
            $table->timestamp('published_at');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('category_id')->references('id')->on('blog_categories');
            $table->foreign('user_id')->references('id')->on('users');

            $table->index('is_published');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_posts');
    }
}
