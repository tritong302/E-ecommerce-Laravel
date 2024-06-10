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
        Schema::table('users', function (Blueprint $table) {
            $table->tinyInteger('role_as')->default(0)->comment('0=user,1=admin');

            // Kiểm tra xem trường 'image' đã tồn tại hay chưa trước khi thêm
            if (!Schema::hasColumn('users', 'image')) {
                $table->string('image')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role_as');
            $table->dropColumn('image');
        });
    }
};
