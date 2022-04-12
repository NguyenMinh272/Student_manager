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
        Schema::create('students', function (Blueprint $table) {
            $table->integer('id')->unsigned()->primary();
            $table->string('full_name',40);
            $table->string('address',50);
            $table->string('email',50);
            $table->string('password',15)->nullable();
            $table->string('social_id',40)->nullable();
            $table->dateTime('birthday')->nullable();
            $table->tinyInteger('gender')->nullable();
            $table->char('phone',15)->nullable();
            $table->string('avatar',255)->nullable();
            $table->integer('faculty_id')->unsigned();
            $table->foreign('faculty_id')->references('id')->on('faculties');
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
        Schema::dropIfExists('students');
    }
};
