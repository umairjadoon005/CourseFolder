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
        Schema::create('course_outlines', function (Blueprint $table) {
            $table->id();
            $table->integer('credit_hours')->nullable();
            //$table->text('pre_requisite')->nullable();
            //$table->text('post_requisite')->nullable();
            $table->string('course_type')->nullable();
            $table->integer('course_duration')->nullable();
            //$table->string('duration_unit')->nullable();
            //$table->text('source_structure')->nullable();
            $table->foreignIdFor(Course::class,'course_id');
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
        Schema::dropIfExists('course_descriptions');
    }
};
