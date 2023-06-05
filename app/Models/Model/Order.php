<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_number',
        'status',
        'currency',
        'discount_total',
        'discount_tax',
        'shipping_total',
        'shipping_tax',
        'cart_tax',
        'total',
        'total_tax',
        'customer_id',
        'customer_ip_address',
        'customer_user_agent',
        'customer_note',
        'billing_first_name',
        'billig_last_name',
        'billing_company',
        'billing_street',
        'billing_postcode',
        'billing_city',
        'billing_state',
        'billing_country',
        'billing_email',
        'billing_phone',
        'shipping_first_name',
        'shipping_last_name',
        'shipping_company',
        'shipping_street',
        'shipping_postcode',
        'shipping_city',
        'shipping_state',
        'shipping_country',
        'payment_method',
        'payment_method_title'
    ];
}
