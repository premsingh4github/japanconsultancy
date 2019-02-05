<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('last_student_name')->nullable();
            $table->string('first_student_name')->nullable();
            $table->string('last_student_japanese_name')->nullable();
            $table->string('first_student_japanese_name')->nullable();
            $table->integer('class_room_batch_id')->nullable();
            $table->string('student_number')->nullable();
            $table->string('residensal_card')->nullable();
            $table->enum('student_sex', ['m', 'f','o'])->default('m');
            $table->integer('country_id')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('entry_date')->nullable();
            $table->string('expire_date')->nullable();
            $table->string('residensal_card_time')->nullable();
            $table->string('residensal_card_expire')->nullable();
            $table->string('address')->nullable();
            $table->string('personal_phone_number')->nullable();
            $table->string('part_time_job_name')->nullable();
            $table->string('phone_where_they_works')->nullable();
            $table->string('address_where_they_works')->nullable();
            $table->string('nearest_station')->nullable();
            $table->string('student_note')->nullable();
            $table->integer('unique_id')->nullable();
            $table->integer('subject_optional_id')->nullable();
            $table->string('photo')->nullable();
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
}
