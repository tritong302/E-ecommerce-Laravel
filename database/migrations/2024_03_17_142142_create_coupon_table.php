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
        Schema::create('coupon', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable()->comment('ma giam gia');
            $table->string('type')->nullable()->comment('loai giam gia, amount: giam theo so tien, percent: giam theo %');
            $table->float('value')->nullable()->comment('giam gia như the nao');
            $table->tinyInteger('status')->nullable()->default(0)->comment('0: chua kich hoat, 1: da kich hoat');
            $table->dateTime('date_end')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupon');
    }
};
