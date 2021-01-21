<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdictsImages extends Model
{
    use HasFactory;
    protected $table = 'products_images';
    public $timestamps = false;

    protected $fillable = ['image_src', 'product_id'];
}
