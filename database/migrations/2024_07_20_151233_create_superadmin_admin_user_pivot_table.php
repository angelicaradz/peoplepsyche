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
        Schema::create('superadmin_admin', function (Blueprint $table) {
            $table->unsignedBigInteger('superadmin_id');
            $table->unsignedBigInteger('admin_id');
            $table->primary(['superadmin_id', 'admin_id']);
            $table->timestamps();
        });

        Schema::create('superadmin_user', function (Blueprint $table) {
            $table->unsignedBigInteger('superadmin_id');
            $table->unsignedBigInteger('user_id');
            $table->primary(['superadmin_id', 'user_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('superadmin_admin');
        Schema::dropIfExists('superadmin_user');
    }
};
