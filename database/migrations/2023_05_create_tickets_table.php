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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('state_id');
            $table->foreign('state_id')->references('id')->on('states');
            $table->timestamp('timestamp');
            $table->unsignedBigInteger('item_id');
            $table->foreign('item_id')->references('id')->on('items');
            $table->string('flaw');
            $table->integer('priority');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
