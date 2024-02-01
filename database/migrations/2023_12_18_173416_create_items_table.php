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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category')->constrained('item_categories');
            $table->foreignId('user_id')->constrained('users');
            $table->string('product_name')->nullable();
            $table->string('qty')->nullable();
            $table->string('serial')->nullable();
            $table->date('delivery_date')->nullable();
            $table->string('device_name')->nullable();
            // $table->string('model_no')->nullable();
            $table->string('pir_no')->unique()->nullable();
            $table->string('po_no')->unique()->nullable();
            $table->double('po_amount')->nullable();
            $table->date('po_date')->nullable();
            $table->integer('warranty_years')->nullable();
            $table->integer('days_left_warranty')->nullable();
            $table->string('mac')->unique()->nullable();
            $table->string('amc_no')->unique()->nullable();
            $table->date('amc_start')->nullable();
            $table->date('amc_end')->nullable();
            $table->boolean('edit_access')->default(0);
            $table->boolean('edited')->default(0);
            $table->text('	edit_reason')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
