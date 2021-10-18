<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTutorClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutor_classes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('course_id')->constrained();
            $table->string('name');
            $table->foreignUuid('user_id')->constrained();
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->integer('minimum_person');
            $table->integer('maximum_person')->nullable();
            $table->longText('description');
            $table->json('requirement');
            $table->string('link');
            $table->bigInteger('price');
            $table->tinyInteger('status')->default(0)->comment('0:waiting, 1:accepted');
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
        Schema::dropIfExists('tutor_classes');
    }
}
