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
        Schema::create('orders_overview', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('cus_name')->nullable();
            $table->string('cus_email')->nullable();
            $table->string('cus_phone')->nullable();
            $table->text('cus_address')->nullable();
            $table->text('note')->nullable();
            $table->float('total')->nullable();
            $table->float('subtotal')->nullable();
            $table->tinyInteger('status')->default(0)->nullable()->comment('0: chua xu ly, 2: da thanh toan, 3:huy');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders_overview');
    }
};
