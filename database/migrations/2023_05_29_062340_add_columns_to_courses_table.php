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
        Schema::table('courses', function (Blueprint $table) {
            $table->text('pre_requisites')->nullable();
            $table->text('post_requisites')->nullable();
            $table->text('topics')->nullable();
            $table->text('assessments')->nullable();
            $table->string('course_coordinator')->nullable();
            $table->string('textbook')->nullable();
            $table->text('reference_material')->nullable();
            $table->text('course_goals')->nullable();
            $table->text('course_duration')->nullable();
            $table->text('instructor_name')->nullable();
            $table->text('topics_covered')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('courses', function (Blueprint $table) {
            //
        });
    }
};
