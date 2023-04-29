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
        Schema::table('attendances', function (Blueprint $table) {
           $table->bigInteger('roll_no')->default(0);
           $table->string('student_name')->nullable();
           $table->string('activity_ref')->default('P');
           $table->integer('total_attendence')->nullable();
           $table->integer('total_absents')->nullable();
           $table->double('percentage')->nullable();
           $table->string('status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('attendances', function (Blueprint $table) {
            //
        });
    }
};
