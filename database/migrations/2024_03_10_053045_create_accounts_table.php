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
        Schema::create('accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('major_id');
            $table->string('name', 50);
            $table->string('email', 100)->unique();
            $table->string('password', 50);
            $table->date('birthday');
            $table->string('phone', 10);
            $table->tinyInteger('role')->default('0');
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
        Schema::dropIfExists('accounts');
    }
};
