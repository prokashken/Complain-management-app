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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('emp_id')->unique();
            $table->string('department')->nullable();
            $table->string('designation')->nullable();
            $table->string('phone')->uniqid();
            $table->string('internal_no')->unique()->nullable();
            $table->string('building_location')->nullable();
            $table->string('floor_no')->nullable();
            $table->string('room_no')->nullable();
            $table->integer('is_admin')->default(2);
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('is_verified')->default(0);
            $table->string('password');
            $table->integer('role')->nullable();
            $table->rememberToken();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
