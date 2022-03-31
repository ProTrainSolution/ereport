<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtherActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('other_activities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->integer('year');
            $table->integer('month');
            $table->integer('week');
            $table->date('report_date')->nullable();
            $table->string('other_act');
            $table->string('other_leader');
            $table->text('other_description')->nullable();
            $table->decimal('other_working_hour');
            $table->text('other_remark')->nullable();
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
        Schema::dropIfExists('other_activities');
    }
}
