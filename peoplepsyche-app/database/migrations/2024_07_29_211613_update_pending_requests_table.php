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
        Schema::table('pending_requests', function (Blueprint $table) {
            $table->string('receipt_path')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Remove the admin_id column from the takers table
        Schema::table('takers', function (Blueprint $table) {
            $table->dropColumn('receipt_path');
        });
    }
};
