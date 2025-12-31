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
        Schema::create('tbl_votes', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->foreignId('poll_id')
                ->constrained('tbl_polls')
                ->cascadeOnDelete();

            $table->foreignId('poll_option_id')
                ->constrained('tbl_poll_options')
                ->cascadeOnDelete();

            $table->timestamps();

            $table->unique(['user_id', 'poll_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('votes');
    }
};
