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
            $table->string('emp_name')->nullable();
            $table->string('emp_id')->nullable();
            $table->string('designation')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('internal_no')->nullable();
            $table->string('building_location')->nullable();
            $table->string('floor_no')->nullable();
            $table->string('room_no')->nullable();
            $table->foreignId('choose_equip')->constrained('items');
            // $table->string('product_name')->nullable();
            $table->string('under_warranty')->nullable();
            // $table->string('amc_no')->nullable();
            $table->integer('ticket_type');
            // $table->integer('error_type');
            $table->text('not_closed_reason')->nullable();
            $table->text('message')->nullable();
            $table->text('action_taken')->nullable();
            $table->string('mechanic')->nullable();
            $table->bigInteger('assigned_person')->nullable();
            $table->integer('status')->default(0);
            $table->boolean('forwarded')->default(false);
            $table->string('screenshot')->nullable();
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
