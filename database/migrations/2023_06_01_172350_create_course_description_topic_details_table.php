<?php

use App\Models\Course;
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
        Schema::create('course_description_topic_details', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Course::class,'course_id')->constraint('courses');
            $table->integer('week_no')->nullable();
            $table->integer('lecture_no')->nullable();
            $table->text('contents')->nullable();
            $table->timestamps();

            // $table->unsignedBigInteger('course_description_id');
            // $table->foreign('course_description_id')->references('id')->on('course_description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_description_topic_details');
    }
};
