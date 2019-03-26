<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('photo')->nullable();
            $table->string('last_teacher_name')->nullable();
            $table->string('first_teacher_name')->nullable();
            $table->string('last_teacher_japanese_name')->nullable();
            $table->string('first_teacher_japanese_name')->nullable();
            $table->enum('teacher_sex', ['m', 'f','o'])->default('m');
            $table->integer('country_id')->nullable();
            $table->integer('subject_id')->nullable();
            $table->string('teacher_number')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('address')->nullable();
            $table->string('personal_phone_number1')->nullable();
            $table->string('personal_phone_number2')->nullable();
            $table->string('personal_phone_number3')->nullable();
            $table->string('teacher_note')->nullable();
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
        Schema::dropIfExists('teachers');
    }
}
