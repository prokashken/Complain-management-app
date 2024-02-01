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
        Schema::create('ticket_forms', function (Blueprint $table) {
            $table->id();
            $table->string('emp_name_show')->nullable()->default('show');
            $table->string('emp_name_required')->nullable()->default('required');

            $table->string('emp_id_show')->nullable()->default('show');
            $table->string('emp_id_required')->nullable()->default('required');

            $table->string('designation_show')->nullable()->default('show');
            $table->string('designation_required')->nullable()->default('required');

            $table->string('email_show')->nullable()->default('show');
            $table->string('email_required')->nullable()->default('required');

            $table->string('phone_show')->nullable()->default('show');
            $table->string('phone_required')->nullable()->default('required');

            $table->string('building_location_show')->nullable()->default('show');
            $table->string('building_location_required')->nullable()->default('required');

            $table->string('floor_no_show')->nullable()->default('show');
            $table->string('floor_no_required')->nullable()->default('required');

            $table->string('room_no_show')->nullable()->default('show');
            $table->string('room_no_required')->nullable()->default('required');

            $table->string('internal_no_show')->nullable()->default('show');
            $table->string('internal_no_required')->nullable()->default('required');

            $table->string('under_warranty_show')->nullable()->default('show');
            $table->string('under_warranty_required')->nullable()->default('required');

            $table->string('message_show')->nullable()->default('show');
            $table->string('message_required')->nullable()->default('required');

            $table->string('pir_no_show')->nullable()->default('show');
            $table->string('pir_no_required')->nullable()->default('required');

            $table->string('device_name_show')->nullable()->default('show');
            $table->string('device_name_required')->nullable()->default('required');

            $table->string('mac_show')->nullable()->default('show');
            $table->string('mac_required')->nullable()->default('required');

            $table->string('under_amc_show')->nullable()->default('show');
            // $table->string('mac_required')->nullable()->default('required');

            $table->string('amc_no_show')->nullable()->default('show');
            $table->string('amc_no_required')->nullable()->default('required');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket_forms');
    }
};
