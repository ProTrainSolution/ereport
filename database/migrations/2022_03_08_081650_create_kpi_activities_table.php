<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKpiActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kpi_activities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kpi_id');
            $table->foreignId('user_id');
            $table->integer('year');
            $table->integer('month');
            $table->integer('week');
            $table->date('report_date')->nullable();
            $table->string('kpi_act');
            $table->text('kpi_description');
            $table->decimal('kpi_working_hour');
            $table->integer('kpi_progress');
            $table->integer('kpi_status')->default('1');
            $table->text('kpi_remark')->nullable();
            $table->integer('status')->default('1');
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
        Schema::dropIfExists('kpi_activities');
    }
}
