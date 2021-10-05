<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTutorClassDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutor_class_details', function (Blueprint $table) {
            $table->foreignUuid('user_id')->constrained();
            $table->foreignUuid('tutor_class_id')->constrained();
            $table->primary(['user_id', 'tutor_class_id']);
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
        Schema::dropIfExists('tutor_class_details');
    }
}
