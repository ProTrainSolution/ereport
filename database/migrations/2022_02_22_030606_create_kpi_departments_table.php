<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKpiDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kpi_departments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('scorecard_id');
            $table->integer('subdomain_id')->default('0');
            $table->string('kpi');
            $table->text('description')->nullable();
            $table->text('target')->nullable();
            $table->text('measurement')->nullable();
            $table->text('remark')->nullable();
            $table->integer('kpi_year')->nullable();
            $table->string('involve_by')->nullable();
            $table->foreignId('user_id')->default('0');
            $table->string('created_date')->nullable();
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
        Schema::dropIfExists('kpi_departments');
    }
}
