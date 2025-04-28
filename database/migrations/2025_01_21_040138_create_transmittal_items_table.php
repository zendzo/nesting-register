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
        Schema::create('transmittal_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('transmittal_id');
            $table->string('mark_number');
            $table->string('material');
            $table->string('material_grade');
            $table->string('thickness');
            $table->integer('quantity');
            $table->string('unit');
            $table->boolean('cutting_status')->default(false);
            $table->date('cutting_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transmittal_items');
    }
};
