<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('item_sale', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('sale_id');
            $table->integer('quantity');
            $table->decimal('unit_price');
            $table->decimal('total_price');
            $table->foreign('item_id')->references('id')->on('items');
            $table->foreign('sale_id')->references('id')->on('sales');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_sale');
    }
};
