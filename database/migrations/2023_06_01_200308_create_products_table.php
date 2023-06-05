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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('images')->nullable();
            $table->text('description')->nullable();
            $table->string('regular_price')->nullable();
            $table->text('categories')->nullable();
            $table->text('tags')->nullable();
            $table->boolean('featured')->default(false);
            $table->integer('quantity')->default(0);
            $table->string('sku')->nullable();
            $table->string('ean')->nullable();
            $table->decimal('sale_price', 10, 2)->nullable();
            $table->dateTime('sale_price_dates_from')->nullable();
            $table->dateTime('sale_price_dates_to')->nullable();
            $table->decimal('tax_percentage', 10, 2)->nullable();
            $table->string('status')->default('draft');
            $table->integer('total_sells')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
