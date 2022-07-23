<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTraineesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainees', function (Blueprint $table) {
            $table->id();
            $table->integer('PID')->min(100000000)->max(999999999)->default(0);
            $table->string('first_name')->nullable();
            $table->string('father_name')->nullable();
            $table->string('grand_name')->nullable();
            $table->string('family_name')->nullable();
            $table->string('full_name')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('city')->nullable();
            $table->string('street')->nullable();
            $table->string('mobile1')->nullable();
            $table->string('mobile2')->nullable();
            $table->foreignId('department_id')->nullable();
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
        Schema::dropIfExists('trainees');
    }
}
