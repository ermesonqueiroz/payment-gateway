<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->float('value');
            $table->integer('status')->default(0);
            $table->foreignId('receiver_id');
            $table->foreignId('sender_id');
            $table->foreign('receiver_id')->on('users')->references('id');
            $table->foreign('sender_id')->on('users')->references('id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
