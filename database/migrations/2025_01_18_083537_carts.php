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
        // إنشاء جدول carts
        Schema::create('carts', function (Blueprint $table) {
            $table->id();  // معرف تلقائي
            $table->integer('total_price');  // تحديد نوع البيانات إلى integer
            $table->integer('quantity');  // تحديد نوع البيانات إلى integer
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');  // ربط product_id بجدول products
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');  // ربط user_id بجدول users
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade');  // ربط order_id بجدول orders
            $table->timestamps();  // تاريخ الإنشاء والتحديث
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // حذف جدول carts في حالة التراجع عن الهجرة
        Schema::dropIfExists('carts');
    }
};
