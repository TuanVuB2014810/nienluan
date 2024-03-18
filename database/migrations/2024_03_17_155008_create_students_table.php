<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->string('id')->primary();
            // $table->string('image', 100);
            $table->unsignedInteger('major_id');
            $table->string('name', 50);
            $table->date('birthday');
            $table->string('sex', 50);
            $table->string('course', 10);
            $table->timestamps();

            $table->foreign('major_id') 
            ->references('id')->on('majors')
            ->onDelete('CASCADE')
            ->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
