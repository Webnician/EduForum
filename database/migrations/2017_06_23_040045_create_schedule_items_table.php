<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScheduleItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index()->foreign()->references("id")->on("users");
            $table->json('shared_with_users')->nullable();
            $table->json('users_involved_in_event')->nullable();
            $table->integer('course_id')->unsigned()->index()->foreign()->references("id")->on("courses")->nullable();
            $table->integer('institution_id')->unsigned()->index()->foreign()->references("id")->on("institutions")->nullable();
            $table->dateTimeTz('event_date_time')->nullable();
            $table->text('type')->nullable();
            $table->text('description')->nullable();
            $table->text('location')->nullable();
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
        Schema::dropIfExists('schedule_items');
    }
}
