<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_activities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->integer('year');
            $table->integer('month');
            $table->integer('week');
            $table->string('report_date')->nullable();
            $table->string('task_act');
            $table->text('task_description');
            $table->decimal('task_working_hour');
            $table->integer('task_progress');
            $table->integer('task_status')->default('1');
            $table->text('task_remark')->nullable();
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
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
        Schema::dropIfExists('task_activities');
    }
}
