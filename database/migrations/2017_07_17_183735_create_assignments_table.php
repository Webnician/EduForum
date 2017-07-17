<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('assigner_user_id')->unsigned()->index()->foreign()->references("id")->on("users")->nullable();
            $table->integer('course_id')->unsigned()->index()->foreign()->references("id")->on("courses");
            $table->string('assignment_name')->nullable();
            $table->string('assignment_type')->nullable();
            $table->json('assignment_content')->nullable();
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
        Schema::dropIfExists('assignments');
    }
}
