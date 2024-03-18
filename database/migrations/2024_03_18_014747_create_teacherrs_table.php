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
        Schema::create('teacherrs', function (Blueprint $table) {
            $table->string('id');
            $table->unsignedInteger('dep_id');
            $table->string('name', 50);
            $table->timestamps();
            $table->foreign('dep_id') 
            ->references('id')->on('departments')
            ->onDelete('CASCADE')
            ->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teacherrs');
    }
};
