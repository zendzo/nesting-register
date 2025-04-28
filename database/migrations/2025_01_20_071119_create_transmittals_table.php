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
        Schema::create('transmittals', function (Blueprint $table) {
            $table->id();
            $table->string('transmittal_number')->nullable();
            $table->foreignID('project_id')->constrained('projects')->onDelete('cascade');
            $table->foreignId('drawing_id')->constrained('drawings')->onDelete('cascade');
            $table->unsignedBigInteger('nesting_by')->nullable();
            $table->unsignedBigInteger('requested_by')->nullable();
            $table->enum('nesting_type', ['Plate','Pipe','Beam'])->default('Plate');
            $table->date('requested_date')->nullable();
            $table->date('issued_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transmittals');
    }
};
