<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specifications', function (Blueprint $table) {
            $table->id();
            $table->string('phone_id');
            $table->string('conpany_id');
            $table->string('name');
            $table->string('Network');
            $table->string('Launch');
            $table->string('Body');
            $table->string('Display'); 
            $table->string('Platform');
            $table->string('Memory');
            $table->string('Main_Camera');
            $table->string('Selfie_Camera');
            $table->string('Sound');
            $table->string('Comms');
            $table->string('Features');
            $table->string('Battery');
            $table->string('Misc');
            $table->string('image_url');
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
        Schema::dropIfExists('specifications');
    }
}
