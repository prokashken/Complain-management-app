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
        Schema::create('registration_forms', function (Blueprint $table) {
            $table->id();
            $table->string('name_show')->nullable()->default('show');
            $table->string('name_required')->nullable()->default('required');

            $table->string('emp_id_show')->nullable()->default('show');
            $table->string('emp_id_required')->nullable()->default('required');

            $table->string('department_show')->nullable()->default('show');
            $table->string('department_required')->nullable()->default('required');

            $table->string('designation_show')->nullable()->default('show');
            $table->string('designation_required')->nullable()->default('required');

            $table->string('phone_show')->nullable()->default('show');
            $table->string('phone_required')->nullable()->default('required');

            $table->string('internal_no_show')->nullable()->default('show');
            $table->string('internal_no_required')->nullable()->default('required');

            $table->string('building_location_show')->nullable()->default('show');
            $table->string('building_location_required')->nullable()->default('required');

            $table->string('floor_no_show')->nullable()->default('show');
            $table->string('floor_no_required')->nullable()->default('required');

            $table->string('room_no_show')->nullable()->default('show');
            $table->string('room_no_required')->nullable()->default('required');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registration_forms');
    }
};
