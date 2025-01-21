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
        Schema::create('registers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('transmittal_id');
            $table->unsignedBigInteger('nesting_type_id');
            $table->date('request_date');
            $table->date('issue_date');
            $table->unsignedBigInteger('nesting_by_id');
            $table->unsignedBigInteger('request_by_id');
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('drawing_id');
            $table->unsignedBigInteger('workshop_id');
            $table->string('progress_status_report');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registers');
    }
};
