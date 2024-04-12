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
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->date('expiry_date')->nullable();
            $table->float('unit_price')->default(1);
            $table->float('quantity')->default(0.00);
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('stock_category')->onDelete('set null');
            // Note: Changed 'StockCategory' to 'stock_category'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};
