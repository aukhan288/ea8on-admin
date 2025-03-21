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



    public function sides()
    {
        return $this->belongsToMany(Side::class, 'product_sides')->withTimestamps();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    

}
