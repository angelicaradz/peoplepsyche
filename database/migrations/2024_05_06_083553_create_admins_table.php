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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('givenName');
            $table->string('middleName')->nullable();
            $table->string('lastName');
            $table->string('suffixName')->nullable();
            $table->string('email')->unique();
            $table->string('cpNumber')->nullable();
            $table->date('birthday');
            $table->enum('sex', ['Male', 'Female']);
            $table->enum('civilStat', ['Single', 'Married', 'Separated', 'Annulled', 'Divorced', 'Widowed']);
            $table->string('religion')->nullable();
            $table->string('address');
            $table->string('address2')->nullable();
            $table->string('address3')->nullable();
            // $table->string('user_code')->unique();
            $table->string('role')->default('admin');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
