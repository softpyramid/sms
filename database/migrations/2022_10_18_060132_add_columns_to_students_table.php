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
            $table->string('gender', 5)->after('name');
            $table->string('identification_mark')->after('photo_path');
            $table->string('blood_group', 10)->after('identification_mark');
            $table->date('birthday')->after('blood_group');
            $table->string('religion', 30)->after('birthday');
            $table->foreignId('identity_id')->after('branch_id');
            $table->foreignId('family_id')->after('identity_id');
            $table->foreignId('country_id')->after('family_id');
            $table->foreignId('city_id')->after('country_id');
            $table->foreignId('student_status_id')->after('city_id');
            $table->timestamp('status_updated_on')->after('student_status_id');
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
