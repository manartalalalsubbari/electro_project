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
        // إنشاء جدول categories
        Schema::create('categories', function (Blueprint $table) {
            $table->id();  // معرف تلقائي
            $table->string('name', 191);  // تحديد طول الاسم إلى 191
            $table->text('description')->nullable();  // جعل الوصف قابلًا لأن يكون فارغًا
            $table->timestamps();  // تاريخ الإنشاء والتحديث
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // حذف جدول categories في حالة التراجع عن الهجرة
        Schema::dropIfExists('categories');
    }
};
