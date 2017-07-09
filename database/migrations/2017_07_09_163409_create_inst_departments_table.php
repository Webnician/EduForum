<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inst_departments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('department_name');
            $table->integer('dept_head_id')->unsigned()->index()->foreign()->references("id")->on("users")->nullable();
            $table->integer('institution_id')->unsigned()->index()->foreign()->references("id")->on("institutions");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inst_departments');
    }
}
