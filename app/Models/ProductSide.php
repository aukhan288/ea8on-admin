<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSide extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id', // Add product_id here
        'title',
        'price',
        'stock',
    ];
}
