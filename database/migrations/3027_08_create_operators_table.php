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
        Schema::create('operators', function (Blueprint $table) {
            $table->smallInteger('id')->autoIncrement()->unsigned()->primary();
            $table->string('name',80);

            $table->unsignedSmallInteger('position_id');
            $table->foreign('position_id')->references('id')->on('positions')->onDelete('cascade');
            
            $table->string('phone',20);
            $table->string('status',15);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('operators');
    }
};
