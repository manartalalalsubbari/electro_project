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
        // إنشاء جدول cache
        Schema::create('cache', function (Blueprint $table) {
            $table->string('key', 191)->primary();  // تحديد طول 191 لتجنب مشاكل MySQL مع utf8mb4
            $table->mediumText('value');  // تخزين القيمة في mediumText
            $table->unsignedInteger('expiration');  // تحديد expiration ليكون عددًا موجبًا
        });

        // إنشاء جدول cache_locks
        Schema::create('cache_locks', function (Blueprint $table) {
            $table->string('key', 191)->primary();  // تحديد طول 191 لتجنب مشاكل MySQL مع utf8mb4
            $table->string('owner');  // مالك القفل
            $table->unsignedInteger('expiration');  // تحديد expiration ليكون عددًا موجبًا
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // حذف الجداول في حالة التراجع عن الهجرة
        Schema::dropIfExists('cache');
        Schema::dropIfExists('cache_locks');
    }
};
