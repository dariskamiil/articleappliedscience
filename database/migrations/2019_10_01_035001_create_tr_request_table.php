<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('tr_request', function (Blueprint $table)
        {
        $table->bigIncrements('request_id');
        $table->text('case_study');
        $table->enum('article_type', ['general', 'confidential']);
        $table->unsignedBigInteger('article_category_id');
        $table->foreign('article_category_id')
            ->references('article_category_id')->on('ms_article_category');
        $table->unsignedBigInteger('author');
        // $table->foreign('author')
        //     ->references('id')->on('ms_user')->onDelete('cascade')->onUpdate('cascade');
        
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
        Schema::dropIfExists('tr_request');
    }
}
