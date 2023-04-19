<?php

use App\Models\User;
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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('course_code');
            $table->string('course_title');
            $table->integer('credit_hours')->nullable();
            $table->text('pre_requisites')->nullable();
            $table->text('topics')->nullable();
            $table->text('assessments')->nullable();
            $table->string('course_coordinator')->nullable();
            $table->string('textbook')->nullable();
            $table->text('reference_material')->nullable();
            $table->text('course_goals')->nullable();
            $table->foreignIdFor(User::class,'user_id');
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
        Schema::dropIfExists('courses');
    }
};
