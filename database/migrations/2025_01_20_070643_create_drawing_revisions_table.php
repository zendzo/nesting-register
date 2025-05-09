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
        Schema::create('drawing_revisions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('drawing_id')->constrained();
            $table->string('revision_number');
            $table->date('revision_date');
            $table->string('revision_title');
            $table->string('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drawing_revisions');
    }
};
