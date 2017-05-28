<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstitutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institutions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('institution_name')->unique();
            $table->string('logo')->nullable();
            $table->string('website')->nullable();
            $table->string('description', 1000)->nullable();
            $table->integer('ipeds_id')->nullable();
            $table->integer('system_id')->nullable();
            $table->integer('admin_id')->unsigned()->index()->foreign()->references("id")->on("users")->onDelete("cascade");
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
        Schema::dropIfExists('institutions');
    }
}
