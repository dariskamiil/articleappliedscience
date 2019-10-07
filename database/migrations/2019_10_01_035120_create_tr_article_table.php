<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tr_article', function (Blueprint $table) {
        $table->bigIncrements('article_id');
        $table->text('title');
        $table->string('content');
        $table->date('research_period');
        $table->string('article_status');
        $table->enum('article_type', ['general', 'confidential']);
        $table->unsignedBigInteger('article_category_id')->nullable();
        $table->foreign('article_category_id')
            ->references('article_category_id')->on('ms_article_category');
        $table->unsignedBigInteger('request_id');
        $table->foreign('request_id')
                ->references('request_id')->on('tr_request')
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
        Schema::dropIfExists('tr_article');
    }
}
