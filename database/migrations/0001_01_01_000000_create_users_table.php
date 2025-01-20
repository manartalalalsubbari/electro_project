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
        // إنشاء جدول المستخدمين
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');  // اسم المستخدم
            $table->string('email', 191)->unique();  // تحديد طول للـ email
            $table->timestamp('email_verified_at')->nullable();  // تاريخ التحقق من البريد الإلكتروني
            $table->string('password');  // كلمة المرور
            $table->string('address');  // العنوان
            $table->string('city');  // المدينة
            $table->string('country');  // الدولة
            $table->string('zip_code');  // الرمز البريدي
            $table->string('telephone');  // الهاتف
            $table->rememberToken();  // تذكر المستخدم
            $table->timestamps();  // تاريخ الإنشاء والتحديث
        });

        // إنشاء جدول إعادة تعيين كلمة المرور
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email', 191)->primary();  // استخدام 191 للحفاظ على التوافق مع MySQL
            $table->string('token');  // رمز إعادة التعيين
            $table->timestamp('created_at')->nullable();  // تاريخ الإنشاء
        });

        // إنشاء جدول الجلسات
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id', 191)->primary();  // تحديد طول id ليكون 191 لتجنب مشاكل الفهرس
            $table->foreignId('user_id')->nullable()->constrained()->index();  // ربط الجلسة بالمستخدم
            $table->string('ip_address', 45)->nullable();  // عنوان الـ IP
            $table->text('user_agent')->nullable();  // وكيل المستخدم
            $table->longText('payload');  // بيانات الجلسة
            $table->integer('last_activity')->index();  // آخر نشاط
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // حذف الجداول في حالة التراجع عن الهجرة
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
