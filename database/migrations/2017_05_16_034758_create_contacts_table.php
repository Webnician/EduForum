<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->string('contact_name');
            $table->string('contact_address');
            $table->string('contact_city');
            $table->string('contact_state');
            $table->string('contact_country');
            $table->string('contact_phone');
            $table->string('email');
            $table->string('contact_type');
            $table->string('contact_user');
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
        Schema::dropIfExists('contacts');
    }
}
