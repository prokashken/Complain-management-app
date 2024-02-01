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
        Schema::create('makepdfs', function (Blueprint $table) {
            $table->id();
            $table->dateTime('from')->nullable();
            $table->dateTime('to')->nullable();
            $table->integer('notDone');
            $table->integer('partialyDone');
            $table->integer('done');
            $table->integer('closed');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('makepdfs');
    }
};
