<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name',
        'category_img',
        'category_img_1',
        'category_img_2',
        'category_img_3',
        'status',
        'description',
    ];
}
