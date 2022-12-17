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
        Schema::create('course_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_group_id');
            $table->unsignedBigInteger('course_type_id');
            $table->string('title');
            $table->longText('content');
            $table->dateTime('release')->default(now());
            $table->unsignedBigInteger('status');
            $table->timestamps();

            $table->foreign('status')
                ->references('id')
                ->on('statuses')
                ->restrictOnDelete()
                ->cascadeOnUpdate();

            $table->foreign('course_group_id')
                ->references('id')
                ->on('course_groups')
                ->restrictOnDelete()
                ->cascadeOnUpdate();

            $table->foreign('course_type_id')
                ->references('id')
                ->on('course_types')
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
        Schema::dropIfExists('course_details');
    }
};
