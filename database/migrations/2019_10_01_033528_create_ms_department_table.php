<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMsDepartmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ms_department', function (Blueprint $table)
        {
        $table->bigIncrements('department_id');
        $table->string('department_name');
        $table->timestamps();
        $table->boolean('is_active');
        $table->unsignedBigInteger('updated_by');
        $table->unsignedBigInteger('created_by');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ms_department');
    }
}
