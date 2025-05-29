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
        // ایجاد جدول users
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->unique();
            $table->string('password');
            $table->string('role')->default('user');
            $table->rememberToken();
            $table->timestamps();
        });

        // ایجاد جدول sessions
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // غیرفعال کردن کلیدهای خارجی برای جلوگیری از خطا
        Schema::disableForeignKeyConstraints();

        // حذف جدول sessions قبل از users به دلیل وابستگی کلید خارجی
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('users');

        // فعال کردن دوباره کلیدهای خارجی
        Schema::enableForeignKeyConstraints();
    }
};
