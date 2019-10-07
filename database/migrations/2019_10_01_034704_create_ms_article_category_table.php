<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMsArticleCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ms_article_category', function (Blueprint $table)
        {
            $table->bigIncrements('article_category_id');
            $table->string('article_category_name');
            
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
        Schema::dropIfExists('ms_article_category');
    }
}