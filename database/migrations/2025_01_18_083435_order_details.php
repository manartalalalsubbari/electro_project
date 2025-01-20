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
        // إنشاء جدول order_details
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();  // معرف تلقائي
            $table->integer('total_price');  // تحديد نوع البيانات إلى integer
            $table->integer('price');  // تحديد نوع البيانات إلى integer
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade');  // ربط order_id بجدول orders
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');  // ربط product_id بجدول products
            $table->timestamps();  // تاريخ الإنشاء والتحديث
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // حذف جدول order_details في حالة التراجع عن الهجرة
        Schema::dropIfExists('order_details');
    }
};
