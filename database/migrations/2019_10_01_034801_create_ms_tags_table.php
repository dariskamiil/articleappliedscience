<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMsTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('ms_tags', function (Blueprint $table)
        {
            $table->string('tags_name');
            $table->bigIncrements('tags_id');
            
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
        Schema::dropIfExists('ms_tags');
    }
}
