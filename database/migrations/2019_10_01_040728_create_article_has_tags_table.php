<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleHasTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_has_tags', function (Blueprint $table) {
            $table->unsignedBigInteger('article_id');
                $table->foreign('article_id')
                        ->references('article_id')->on('tr_article')
                        ->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('request_id');
                $table->foreign('request_id')
                        ->references('request_id')->on('tr_request')
                        ->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('tags_id');
                $table->foreign('tags_id')
                        ->references('tags_id')->on('ms_tags')
                        ->onDelete('cascade')->onUpdate('cascade');
        

            $table->boolean('is_active');
            $table->timestamps();
            $table->unsignedBigInteger('created_by');
                $table->foreign('created_by')
                        ->references('id')->on('ms_users')
                        ->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('updated_by');
                    $table->foreign('updated_by')
                        ->references('id')->on('ms_users')
                        ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article_has_tags');
    }
}
