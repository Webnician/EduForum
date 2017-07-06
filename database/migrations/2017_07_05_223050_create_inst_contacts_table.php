<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inst_contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('institution_id')->unsigned()->index()->foreign()->references("id")->on("institutions")->onDelete("cascade");
            $table->string('contact_address')->nullable();
            $table->string('contact_city')->nullable();
            $table->string('contact_state')->nullable();
            $table->integer('contact_zip')->nullable();
            $table->string('contact_country')->nullable();
            $table->string('contact_phone')->nullable();
            $table->string('contact_type')->nullable();

            $table->timestamps();
        });

        Schema::dropIfExists('institution_contact');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inst_contacts');
    }
}
