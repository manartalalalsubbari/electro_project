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
        // إنشاء جدول newsletter_subscriptions
        Schema::create('newsletter_subscriptions', function (Blueprint $table) {
            $table->id();  // معرف تلقائي
            $table->string('email')->unique();  // البريد الإلكتروني الفريد
            $table->timestamps();  // تاريخ الإنشاء والتحديث
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // حذف جدول newsletter_subscriptions في حالة التراجع عن الهجرة
        Schema::dropIfExists('newsletter_subscriptions');
    }
};
