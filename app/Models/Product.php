<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name',
        'category_img',
        'category_img_1',
        'category_img_2',
        'category_img_3',
    ];

    public function sizes()
    {
        return $this->hasMany(ProductSize::class);
    }
    public function flavours()
    {
        return $this->hasMany(ProductFlavour::class);
    }
    public function ingredients()
    {
        return $this->hasMany(Ingredient::class);
    }
    public function sides()
    {
        return $this->hasMany(ProductSide::class);
    }
}
