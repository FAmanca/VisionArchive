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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('UserId');
            $table->foreignId('FotoId');
            $table->enum('category', [
                'Spam/Advertisement',
                'Inappropriate Content',
                'Copyright Violation',
                'Harassment/Bullying',
                'Pornography/Adult Content',
            ]);
            $table->text('reason')->nullable();
            $table->enum('status', ['pending', 'reviewed', 'resolved'])->default('pending'); // Status laporan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
