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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->float('vnp_Amount')->comment('Số tiền thanh toán');
            $table->string('vnp_BankCode');
            $table->string('vnp_OrderInfo');
            $table->string('vnp_PayDate');
            $table->string('vnp_ResponseCode')->comment('Mã phản hồi');
            $table->string('vnp_TxnRef')->comment('Mã đơn hàng');
            $table->string('vnp_BankTranNo')->comment('Mã giao dịch');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id') -> references('id') -> on('users') -> onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
