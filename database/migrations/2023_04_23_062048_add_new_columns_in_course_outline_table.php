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
            $table->string('weekly_tution_pattern');
            $table->text('course_structure');
            $table->text('course_style');
            $table->string('web_link');
            $table->string('teaching_team');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('course_outline', function (Blueprint $table) {
            //
        });
    }
};
