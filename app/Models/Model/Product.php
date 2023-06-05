<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'images',
        'description',
        'regular_price',
        'categories',
        'tags',
        'featured',
        'quantity',
        'sku',
        'ean',
        'sale_price',
        'sale_price_dates_from',
        'sale_price_dates_to',
        'tax_percentage',
        'status',
        'total_sells'
    ];
}
