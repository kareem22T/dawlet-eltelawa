<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('contestant_id')->constrained()->onDelete('cascade');
            $table->string('voter_name');
            $table->string('voter_email');
            $table->string('voter_phone');
            $table->string('ip_address');
            $table->string('user_agent')->nullable();
            $table->timestamp('voted_at');
            $table->timestamps();

            // Indexes for faster queries
            $table->index('ip_address');
            $table->index('voter_email');
            $table->index('voted_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('votes');
    }
};