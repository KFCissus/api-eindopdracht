<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Klant extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('klanten', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('password');


               ; // ->onUpdate('cascade')->onDelete('cascade');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('klanten');
    }
}
