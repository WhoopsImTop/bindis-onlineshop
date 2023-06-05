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
            //get woocommerce order fields
            $table->string('order_number');
            $table->string('status')->default('pending');
            $table->string('currency')->default('EUR');
            $table->decimal('discount_total', 10, 2)->nullable();
            $table->decimal('discount_tax', 10, 2)->nullable();
            $table->decimal('shipping_total', 10, 2)->nullable();
            $table->decimal('shipping_tax', 10, 2)->nullable();
            $table->decimal('cart_tax', 10, 2);
            $table->decimal('total', 10, 2);
            $table->decimal('total_tax', 10, 2);
            $table->string('customer_id')->nullable();
            $table->string('customer_ip_address')->nullable();
            $table->string('customer_user_agent')->nullable();
            $table->string('customer_note')->nullable();
            $table->string('billing_first_name');
            $table->string('billig_last_name');
            $table->string('billing_company');
            $table->string('billing_street');
            $table->string('billing_postcode');
            $table->string('billing_city');
            $table->string('billing_state');
            $table->string('billing_country');
            $table->string('billing_email');
            $table->string('billing_phone');
            $table->string('shipping_first_name')->nullable();
            $table->string('shipping_last_name')->nullable();
            $table->string('shipping_company')->nullable();
            $table->string('shipping_street')->nullable();
            $table->string('shipping_postcode')->nullable();
            $table->string('shipping_city')->nullable();
            $table->string('shipping_state')->nullable();
            $table->string('shipping_country')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('payment_method_title')->nullable();
            $table->string('transaction_id')->nullable();
            $table->dateTime('date_paid')->nullable();
            $table->dateTime('date_completed')->nullable();
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
