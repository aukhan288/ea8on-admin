<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductFlavour extends Model
{
    use HasFactory;

    protected $table = 'product_flavours'; 

    protected $fillable = [
        'product_id', // Add product_id here
        'title',
        'price',
        'stock',
    ];
}
