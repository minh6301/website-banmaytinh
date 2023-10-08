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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('email');
            $table->unsignedInteger('phone');
            $table->string('city');
            $table->string('district');
            $table->string('ward');
            $table->string('home');
            $table->unsignedInteger('totalprice');
            $table->string('product');
            $table->string('yeucau');
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
        Schema::dropIfExists('orders');
    }
};
