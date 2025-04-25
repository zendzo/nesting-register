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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('project_name');
            $table->string('project_code')->unique();
            $table->string('fabrication_location');
            $table->string('installation_location');
            $table->unsignedBigInteger('company_id')->refrences('id')->on('companies')->onDelete('cascade');
            $table->unsignedBigInteger('contractor_id')->refrences('id')->on('companies')->onDelete('cascade');
            $table->unsignedBigInteger('client_id')->refrences('id')->on('companies')->onDelete('cascade');
            $table->string('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
