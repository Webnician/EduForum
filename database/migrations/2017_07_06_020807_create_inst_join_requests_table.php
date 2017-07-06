<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstJoinRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inst_join_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index()->foreign()->references("id")->on("users");
            $table->integer('institution_id')->unsigned()->index()->foreign()->references("id")->on("institutions");
            $table->string('request_status');
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
        Schema::dropIfExists('inst_join_requests');
    }
}
