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
        Schema::create('examples', function (Blueprint $table) {
            $table->id();
            $table->string('text');
            $table->string('number');
            $table->string('email');
            $table->string('password');
            $table->string('file');
            $table->date('date');
            $table->time('time');
            $table->dateTime('datetime-local');
            $table->string('select');
            $table->string('select2');
            $table->text('textarea');
            $table->text('editor');
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
        Schema::dropIfExists('examples');
    }
};
