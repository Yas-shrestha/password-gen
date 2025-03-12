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
        Schema::create('user_passes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key to users table
            $table->string('app_name'); // The application name (e.g., Facebook, Twitter)
            $table->text('password'); // Store encrypted passwords 
            $table->string('username')->nullable(); // Optional: Store the username/email for the account
            $table->text('notes')->nullable(); // Optional: Allow users to add extra info
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_passes');
    }
};
