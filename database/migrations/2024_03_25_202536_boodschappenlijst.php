<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Boodschappenlijst extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boodschappenlijst', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->references('id')->on('Orders');
            $table->foreignId('item_id')->nullable()->references('id')->on('artikelen');
            $table->integer('count');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('boodschappenlijst');
    }
}
