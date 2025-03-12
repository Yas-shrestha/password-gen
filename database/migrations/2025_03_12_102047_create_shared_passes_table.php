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
        Schema::create('shared_passes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_pass_id')->constrained('user_passes')->onDelete('cascade'); // Links to the password
            $table->foreignId('shared_with_user_id')->constrained('users')->onDelete('cascade'); // Recipient user
            $table->foreignId('shared_by_user_id')->constrained('users')->onDelete('cascade'); // Owner who shared it
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shared_passes');
    }
};
