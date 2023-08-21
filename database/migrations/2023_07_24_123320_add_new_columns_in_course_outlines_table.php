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
            $table->text('textbook')->nullable();
            $table->text('objectives')->nullable();
            $table->text('other_resources')->nullable();
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
