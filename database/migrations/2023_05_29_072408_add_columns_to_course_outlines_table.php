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
        Schema::table('course_outlines', function (Blueprint $table) {
            //$table->string('outline');
            $table->string('course_description');
            $table->string('slos');
            $table->string('tools_and_tech');
            $table->string('tentative_grading_policy');
            $table->string('attendance');
            $table->string('general_info');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('course_outlines', function (Blueprint $table) {
            //
        });
    }
};
