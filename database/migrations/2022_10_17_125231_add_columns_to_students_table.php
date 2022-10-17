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
        Schema::table('students', function (Blueprint $table) {
            
            $table->string('registration_no', 50)->after('id');
            $table->string('gender', 10);
            $table->string('identity_id');
            $table->string('identification_mark');
            $table->string('blood_group');
            $table->date('birthday');
            $table->string('religion');
            $table->foreignId('family_id');
            $table->foreignId('country_id');
            $table->foreignId('city_id');
            $table->foreignId('student_status_id');
            $table->timestamp('status_updated_on');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            //
        });
    }
};
