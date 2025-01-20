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
        // إنشاء جدول products
        Schema::create('products', function (Blueprint $table) {
            $table->id();  // معرف تلقائي
            $table->string('name', 191);  // تحديد طول الاسم إلى 191 لتجنب مشاكل الفهرس
            $table->string('img_url');  // إضافة رابط الصورة
            $table->text('description')->nullable();  // جعل الوصف قابلًا لأن يكون فارغًا
            $table->integer('price');  // تحديد نوع البيانات إلى integer
            $table->integer('discount');  // تحديد نوع البيانات إلى integer
            $table->integer('stock_quantity');  // تحديد نوع البيانات إلى integer
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');  // ربط category_id بجدول categories
            $table->timestamps();  // تاريخ الإنشاء والتحديث
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // حذف جدول products في حالة التراجع عن الهجرة
        Schema::dropIfExists('products');
    }
};
