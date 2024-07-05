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
        Schema::create('users', function (Blueprint $table) {
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
            $table->unsignedBigInteger('admin_id');
            $table->string('role')->default('client');
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

        // Schema::table('users', function(Blueprint $table){
        //     $table->dropForeign('admin_id');
        //     $table->dropIndex('admin_id');
        //     $table->dropColumn('admin_id');
        // });
        Schema::dropIfExists('users');

    }
};
