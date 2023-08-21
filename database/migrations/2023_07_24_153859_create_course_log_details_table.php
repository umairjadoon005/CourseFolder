<?php

use App\Models\CourseLog;
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
        Schema::create('course_log_details', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(CourseLog::class);
            $table->date('log_date');
            $table->string('lecture_number');
            $table->text('topics_covered')->nullable();
            $table->string('duration')->nullable();
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
        Schema::dropIfExists('course_log_details');
    }
};
