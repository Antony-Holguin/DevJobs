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
        Schema::table('job_openings', function (Blueprint $table) {
            $table->string('title');
            $table->foreignId('salary_id')->constrained()->onDelete('cascade');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('company');
            $table->date('last_day');
            $table->text('description');
            $table->string('image');
            $table->integer('is_posted')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('job_openings', function (Blueprint $table) {
            $table->dropForeign('job_openings_category_id_foreign');
            $table->dropForeign('job_openings_salary_id_foreign');
            $table->dropForeign('job_openings_user_id_foreign');
            $table->dropColumn([
                'title',
                'salary_id', 
                'category_id', 
                'user_id',
                'company',
                'last_day',
                'description',
                'image',
                'is_posted'
            ]);
        });
    }
};
