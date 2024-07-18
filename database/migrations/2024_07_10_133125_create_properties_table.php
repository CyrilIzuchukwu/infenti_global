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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('property_type');
            $table->string('title');
            $table->longText('description');
            $table->string('property_status');
            $table->decimal('price', 12, 2);
            $table->json('location');
            $table->json('details')->nullable();
            $table->json('additional_features')->nullable();
            $table->text('terms')->nullable();

            $table->string('property_image');
            $table->json('related_images')->nullable();
            $table->string('status')->nullable();
            $table->string('custom_fields')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
