<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('university_id')->constrained();
            $table->string('name');
            $table->string('google_id')->nullable()->default(null);
            $table->string('password');
            $table->string('email')->unique();
            $table->bigInteger('balance')->default(0);
            $table->string('phone_number')->nullable();
            $table->double('rating')->nullable()->default(null);
            $table->string('role')->default('Member');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
