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
        Schema::create('item_forms', function (Blueprint $table) {
            $table->id();
            $table->string('emp_name_show')->nullable()->default('show');

            $table->string('emp_id_show')->nullable()->default('show');

            $table->string('designation_show')->nullable()->default('show');

            $table->string('email_show')->nullable()->default('show');

            $table->string('phone_show')->nullable()->default('show');

            $table->string('building_location_show')->nullable()->default('show');

            $table->string('floor_no_show')->nullable()->default('show');

            $table->string('room_no_show')->nullable()->default('show');

            $table->string('product_name_show')->nullable()->default('show');
            $table->string('product_name_required')->nullable()->default('required');

            $table->string('qty_show')->nullable()->default('show');
            $table->string('qty_required')->nullable()->default('required');

            $table->string('delivery_date_show')->nullable()->default('show');
            $table->string('delivery_date_required')->nullable()->default('required');

            $table->string('device_name_show')->nullable()->default('show');
            $table->string('device_name_required')->nullable()->default('required');

            $table->string('pir_no_show')->nullable()->default('show');
            $table->string('pir_no_required')->nullable()->default('required');

            $table->string('po_no_show')->nullable()->default('show');
            $table->string('po_no_required')->nullable()->default('required');

            $table->string('po_amount_show')->nullable()->default('show');
            $table->string('po_amount_required')->nullable()->default('required');

            $table->string('po_date_show')->nullable()->default('show');
            $table->string('po_date_required')->nullable()->default('required');

            $table->string('warranty_years_show')->nullable()->default('show');
            $table->string('warranty_years_required')->nullable()->default('required');

            $table->string('days_left_warranty_show')->nullable()->default('show');
            $table->string('days_left_warranty_required')->nullable()->default('required');

            $table->string('mac_show')->nullable()->default('show');
            $table->string('mac_required')->nullable()->default('required');

            $table->string('amc_no_show')->nullable()->default('show');
            $table->string('amc_no_required')->nullable()->default('required');

            $table->string('amc_start_show')->nullable()->default('show');
            $table->string('amc_start_required')->nullable()->default('required');

            $table->string('amc_end_show')->nullable()->default('show');
            $table->string('amc_end_required')->nullable()->default('required');

            $table->string('want_amc_show')->nullable()->default('show');
            $table->string('want_amc_required')->nullable()->default('required');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_forms');
    }
};
