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
        // إنشاء جدول jobs
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();  // معرف تلقائي
            $table->string('queue', 191)->index();  // تحديد طول للـ queue
            $table->longText('payload');  // تخزين بيانات الـ job
            $table->unsignedTinyInteger('attempts');  // عدد المحاولات
            $table->unsignedInteger('reserved_at')->nullable();  // وقت الحجز (nullable)
            $table->unsignedInteger('available_at');  // وقت التوفر
            $table->unsignedInteger('created_at');  // وقت الإنشاء
        });

        // إنشاء جدول job_batches
        Schema::create('job_batches', function (Blueprint $table) {
            $table->string('id', 191)->primary();  // تحديد طول 191 لتجنب مشاكل MySQL
            $table->string('name');  // اسم الدفعة
            $table->unsignedInteger('total_jobs');  // إجمالي الوظائف
            $table->unsignedInteger('pending_jobs');  // الوظائف المعلقة
            $table->unsignedInteger('failed_jobs');  // الوظائف الفاشلة
            $table->longText('failed_job_ids');  // معرّفات الوظائف الفاشلة
            $table->mediumText('options')->nullable();  // خيارات إضافية (nullable)
            $table->unsignedInteger('cancelled_at')->nullable();  // وقت الإلغاء (nullable)
            $table->unsignedInteger('created_at');  // وقت الإنشاء
            $table->unsignedInteger('finished_at')->nullable();  // وقت الانتهاء (nullable)
        });

        // إنشاء جدول failed_jobs
        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->id();  // معرف تلقائي
            $table->string('uuid')->unique();  // معرف فريد للوظيفة الفاشلة
            $table->text('connection');  // الاتصال
            $table->text('queue');  // الطابور
            $table->longText('payload');  // بيانات الـ job
            $table->longText('exception');  // الاستثناء
            $table->timestamp('failed_at')->useCurrent();  // تاريخ الفشل
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // حذف الجداول في حالة التراجع عن الهجرة
        Schema::dropIfExists('jobs');
        Schema::dropIfExists('job_batches');
        Schema::dropIfExists('failed_jobs');
    }
};
