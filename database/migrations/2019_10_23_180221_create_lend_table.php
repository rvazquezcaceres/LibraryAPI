<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLendTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lend', function (Blueprint $table) {
            $table->increments('id_lend')->unique();
            $table->dateTime('date');
            $table->integer('id_user')->unsigned();
            $table->integer('id_book')->unsigned();
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_book')->references('id')->on('books');
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
        Schema::dropIfExists('lend');
    }
}
