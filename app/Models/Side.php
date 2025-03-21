<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Side extends Model
{
    use HasFactory;

    // Allow mass assignment for these fields
    protected $fillable = ['name', 'description', 'image', 'price', 'status']; 

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_sides')->withTimestamps();
    }

}
