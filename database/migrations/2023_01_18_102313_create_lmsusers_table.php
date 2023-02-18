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
        Schema::create('lmsusers', function (Blueprint $table) {
            $table->id('user_id');
            $table->string('name',100);
            $table->enum('gender', ['male', 'female','other']);
            $table->string('email',100);
            $table->string('password',100);
            $table->string('phone',20);
            $table->text('address');
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
        Schema::dropIfExists('lmsusers');
    }
};
