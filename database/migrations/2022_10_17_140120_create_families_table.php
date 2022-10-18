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
        Schema::create('families', function (Blueprint $table) {
            $table->id();
            $table->string('family_no')->nullable();
            $table->string('type', 5);
            $table->string('name');
            $table->string('address')->nullable();
            $table->string('occupation')->nullable();
            $table->string('mobile');
            $table->string('home_mobile')->nullable();
            $table->string('email')->nullable();
            $table->foreignId('identity_id');
            $table->foreignId('country_id');
            $table->foreignId('city_id');

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
        Schema::dropIfExists('families');
    }
};
