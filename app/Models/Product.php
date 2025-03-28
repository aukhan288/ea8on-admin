<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'category_id',
        'description',
        'sandwich_price',
        'stock',
        'main_img',
        'category_img_1',
        'category_img_2',
        'category_img_3',
    ];



    public function sides()
    {
        return $this->belongsToMany(Side::class, 'product_sides')->withTimestamps();
    }
    public function flavours()
    {
        return $this->hasMany(ProductFlavour::class)->withTimestamps();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    

}
