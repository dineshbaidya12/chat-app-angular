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
            $table->string('first_name', 200)->after('id');
            $table->string('last_name', 200)->after('first_name')->nullable();
            $table->string('username', 200)->after('name');
            $table->text('image')->nullable()->after('username');
            $table->enum('role', ['admin', 'user'])->default('user')->after('password');
            $table->enum('status', ['active', 'inactive', 'banned'])->default('inactive')->after('role');
            $table->enum('email_verified', ['pending', 'done'])->after('email');
            $table->string('otp', 10)->nullable()->after('email_verified');
            $table->timestamp('otp_requested_at')->nullable()->after('otp');
            $table->text('user_token')->nullable()->after('otp_requested_at');
            $table->enum('first_welcome', ['pending', 'done'])->default('pending')->after('user_token');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'first_name',
                'last_name',
                'username',
                'image',
                'role',
                'status',
                'email_verified',
                'otp',
                'otp_requested_at',
                'user_token',
                'first_welcome'
            ]);
        });
    }
};
