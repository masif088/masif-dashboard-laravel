<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('room_id');
            $table->string('title');
            $table->string('slug');
            $table->dateTime('release')->default(now());
            $table->unsignedBigInteger('status');
            $table->timestamps();

            $table->foreign('room_id')
                ->references('id')
                ->on('rooms')
                ->restrictOnDelete()
                ->cascadeOnUpdate();
            $table->foreign('status')
                ->references('id')
                ->on('statuses')
                ->restrictOnDelete()
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
};
