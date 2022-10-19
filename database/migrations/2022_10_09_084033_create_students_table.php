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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('registration_no')->nullable();
            $table->string('name');
            $table->string('gender', 5);
            $table->string('photo_path')->nullable();
            $table->string('identification_mark', 50)->nullable();
            $table->string('blood_group', 10);
            $table->date('birthday')->nullable();   
            $table->foreignId('grade_id');
            $table->foreignId('section_id')->nullabe();
            $table->foreignId('family_id');
            $table->foreignId('country_id')->nullabe();
            $table->foreignId('city_id')->nullabe();
            $table->foreignId('branch_id');
            $table->string('religion', 50);
            $table->foreignId('status_id')->nullabe();
            $table->date('status_updated_on')->nullabe();

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
        Schema::dropIfExists('students');
    }
};
