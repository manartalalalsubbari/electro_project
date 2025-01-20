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
        // إنشاء جدول orders
        Schema::create('orders', function (Blueprint $table) {
            $table->id();  // معرف تلقائي
            $table->integer('total_price');  // تحديد نوع البيانات إلى integer
            $table->date('order_date');  // تحديد نوع البيانات إلى date بدلاً من string
            $table->string('status')->nullable();  // إضافة nullable() إذا كان يمكن أن يكون فارغًا
            $table->timestamps();  // تاريخ الإنشاء والتحديث
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // حذف جدول orders في حالة التراجع عن الهجرة
        Schema::dropIfExists('orders');
    }
};
