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
        Schema::create('majors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100)->unique();
            $table->unsignedInteger('dep_id');
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
        Schema::dropIfExists('majors');
    }
};
