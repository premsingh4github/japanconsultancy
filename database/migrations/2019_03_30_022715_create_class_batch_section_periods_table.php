<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassBatchSectionPeriodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('class_batch_section_periods')) {
            Schema::create('class_batch_section_periods', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('c_b_s_id')->nullable();
                $table->integer('period_id')->nullable();
                $table->string('start_at')->nullable();
                $table->string('end_at')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_batch_section_periods');
    }
}
