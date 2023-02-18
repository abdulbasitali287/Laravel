<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrowreturned', function (Blueprint $table) {
            $table->id('return_id');
            $table->unsignedBigInteger('borrowing_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('book_id');
            $table->date('returned_date');
            $table->date('due_date');
            $table->integer('fine');
            $table->foreign('borrowing_id')->references('borrowing_id')->on('borrowing');
            $table->foreign('user_id')->references('user_id')->on('lmsusers');
            $table->foreign('book_id')->references('book_id')->on('books');
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
        Schema::dropIfExists('borrowreturned');
    }
};
