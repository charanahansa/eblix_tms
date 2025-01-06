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
        Schema::table('users', function (Blueprint $table) {
            // Add new columns
            $table->string('contact_no', 15)->after('email');
            $table->boolean('active')->default(1)->after('contact_no');
            $table->boolean('admin')->default(0)->after('active');

            // Modify existing column sizes
            $table->string('name', 50)->change();
            $table->string('email', 30)->change();
            $table->string('password', 12)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Drop the newly added columns
            $table->dropColumn('contact_no');
            $table->dropColumn('active');
            $table->dropColumn('admin');

            // Revert column sizes to original values
            $table->string('name', 191)->change();
            $table->string('email', 191)->change();
            $table->string('password', 191)->change();
        });
    }
};
