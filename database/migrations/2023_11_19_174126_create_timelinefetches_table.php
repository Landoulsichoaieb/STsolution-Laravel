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
        Schema::create('timelinefetches', function (Blueprint $table) {
            $table->id();
            $table->int('user');
            $table->int('timeline');
            $table->string('title');
            $table->text('description');
            $table->string('type');
            $table->string('datemeeting');
            $table->string('status');
            $table->date('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('timelinefetches');
    }
};
