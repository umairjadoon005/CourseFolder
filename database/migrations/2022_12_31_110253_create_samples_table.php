<?php

use App\Models\Course;
use App\Models\QuestionPapers;
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
        Schema::create('samples', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('sample_type')->nullable();
            $table->text('description')->nullable();
            $table->text('document_path')->nullable();
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
        Schema::dropIfExists('samples');
    }
};
