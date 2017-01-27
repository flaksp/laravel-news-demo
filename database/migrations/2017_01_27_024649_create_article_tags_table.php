<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_tags', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->integer('article_id')->unsigned();
            $table->string('tag');
        });

        Schema::table('article_tags', function ($table) {
            $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');

            $table->index('article_id');
            $table->index('tag');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article_tags');
    }
}
