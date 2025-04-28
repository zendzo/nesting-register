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
        Schema::create('drawings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained('projects')->onDelete('cascade');
            $table->string('drawing_number')->unique();
            $table->string('drawing_title');
            $table->string('status');
            $table->string('remarks');
            // $table->string('name')->virtualAs('concat(drawing_number, \' \', drawing_title)');
            $table->string('name')->virtualAs("drawing_number || ' ' || drawing_title");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drawings');
    }
};
