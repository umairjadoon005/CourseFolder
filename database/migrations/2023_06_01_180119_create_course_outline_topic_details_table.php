<?php

use App\Models\CourseOutline;
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
        Schema::create('course_outline_topic_details', function (Blueprint $table) {
            $table->id();     
            $table->foreignIdFor(CourseOutline::class,'course_outlines_id')->constraint('course_outlines');
            $table->integer('week_no')->nullable();
            $table->text('topics')->nullable();
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
        Schema::dropIfExists('course_outline_topic_details');
    }
};
