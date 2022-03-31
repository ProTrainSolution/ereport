<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKpisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kpis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('kpi_type_id');
            $table->foreignId('scorecard_id');
            $table->foreignId('kpi_department_id')->nullable();
            $table->string('kpi')->nullable();
            $table->integer('weightage');
            $table->string('target');
            $table->string('measurement');
            $table->float('progress')->nullable();
            $table->string('remark')->nullable();
            $table->integer('kpi_year');
            $table->integer('status')->nullable();
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
        Schema::dropIfExists('kpis');
    }
}
