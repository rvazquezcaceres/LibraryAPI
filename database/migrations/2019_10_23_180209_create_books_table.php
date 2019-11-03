<?php

use App\book;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('title');
            $table->text('description');
            $table->timestamps();
        });

        $book = new App\book();
        $book->title='Ready Player One';
        $book->description='realidad virtual';
        $book2 = new App\book();
        $book2->title="50 Sombras";
        $book2->description='puta mierda';
        $book->save();
        $book2->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
