<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParamDayHoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('day_hours', function (Blueprint $table) {
            $table->id();
            $table->date('choosed_day')->nullable();
            $table->time('start_hour')->nullable();
            $table->time('end_hour')->nullable();
            $table->integer('selected_number')->nullable();
            $table->timestamps();
        });

        // Schema::table('day_hours', function (Blueprint $table) {
        //     $table->foreignId('param_days_id')->constrained();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('day_hours');
    }
}
