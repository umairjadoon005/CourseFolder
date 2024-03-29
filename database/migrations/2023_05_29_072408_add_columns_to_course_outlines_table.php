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
            $table->text('course_description')->nullable();
            $table->text('slos')->nullable();
            $table->text('tools_and_tech')->nullable();
            $table->text('tentative_grading_policy')->nullable();
            $table->text('attendance')->nullable();
            $table->text('general_info')->nullable();
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
