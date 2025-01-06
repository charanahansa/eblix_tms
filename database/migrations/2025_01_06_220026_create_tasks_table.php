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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->dateTime('task_date');
            $table->string('title', 50);
            $table->string('description', 500);
            $table->date('due_date');
            $table->foreignId('user_id');
            $table->enum('status_id', ['pending', 'completed']);
            $table->timestamps(0); // Default timestamp fields
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
